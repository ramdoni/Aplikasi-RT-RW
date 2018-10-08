<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MootaGrabMutasi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Moota:grab';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      echo "\n\n";
      echo " ================================================== \n";
      echo " MOOTA GRAB MUTASI \n";
      echo " ================================================== \n \n";

      $banks = \Kodami\Models\Mysql\RekeningBank::whereNotNull('moota_bank_id')->get();

      foreach($banks as $bank)
      {
        echo " BANK : ". strtoupper($bank->bank->nama) ." \n";
        echo " NO REKENING : ". strtoupper($bank->no_rekening) ." \n";
        echo " ATAS NAMA : ". strtoupper($bank->owner) ." \n\n";

        // GRAB MUTASI
        $allmutasi = moota_mutasi($bank->moota_bank_id);
        if(isset($allmutasi->data))
        {
          foreach($allmutasi->data as $mutasi)
          {
            $temp = \Kodami\Models\Mysql\Mutation::where('mutation_id', $mutasi->mutation_id)->first();

            if(!$temp)
            {
              $temp                   = new \Kodami\Models\Mysql\Mutation();
              $temp->rekening_bank_id = $bank->id;
              $temp->date_transfer    = $mutasi->date;
              $temp->description      = $mutasi->description;
              $temp->amount           = $mutasi->amount;
              $temp->type             = $mutasi->type == 'DB' ? 2 : 1;
              $temp->note             = $mutasi->note;
              $temp->account_number   = $mutasi->account_number;
              $temp->mutation_id      = $mutasi->mutation_id;
              $temp->created_at_mutation=$mutasi->created_at;
              $temp->save();

              echo " DATE TRANSFER : ". strtoupper($bank->atas_nama) ." \n";
              echo " DESCRIPTION : ". strtoupper($mutasi->description) ." \n";
              echo " AMOUNT : ". strtoupper($mutasi->amount) ." \n";
              echo " TYPE : ". strtoupper($mutasi->type) ." \n\n";

              /**
               * CEK TRANSAKSI YANG ADA DI-DEPOSIT
               */
              # CEK PEMBAYARAN DEPOSIT AWAL
              # VALIDASI PEMBAYARAN ANGGOTA
              echo " CEK MUTASI PEMBAYARAN ANGGOTA \n";
              $deposit_awal = \Kodami\Models\Mysql\Deposit::where('type', 1)->where(function($table){
                $table->where('status', 1)->orWhere('status', 2);
              })->where('nominal', $mutasi->amount)->first();

              if($deposit_awal)
              {
                $deposit                  = \Kodami\Models\Mysql\Deposit::where('id', $deposit_awal->id)->first();
                $deposit->mutation_id     = $temp->id;
                $deposit->mutation_datesyn= date('Y-m-d H:i:s');
                $deposit->status          = 3; // Rubah status menjadi lunas
                $deposit->save();

                echo " =================================================\n";
                echo " NOMINAL : ". $mutasi->amount ."\n";
                echo " NAME : ". $deposit->user->name ."\n";
                echo " NIK : ". $deposit->user->nik ."\n";
                echo " SEND EMAIL KE ANGGOTA ...  \n";

                $params['text'] = '<p>Dear Ibu/Bapak '. $deposit->user->name .'<br />Pembayaran Data Anggota Anda berhasil</p>';

                # send email
                \Mail::send('email.default', $params,
                  function($message) use($deposit) {
                      $message->from('services@kodami.co.id');
                      $message->to($deposit->user->email);
                      $message->subject('Koperasi Produsen Daya  Masyarakat Indonesia - Pembayaran Anggota Berhasil');
                  }
                );
                
                echo " SUCCESS EMAIL : ". $deposit->user->email ."\n";
                echo " =================================================\n\n";
              }
            }
          }
        }
      }
    }
}
