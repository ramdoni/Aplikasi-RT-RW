<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MootaInit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Moota:init';

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
      /**
       * MOOTA
       * INIT BANK
       */
       echo "\n\n";
       echo " ================================================== \n";
       echo " INIT GET API MOOTA \n";
       echo " ================================================== \n \n";

       $moota_bank = moota_bank();

       if(isset($moota_bank->data)){
         foreach($moota_bank->data as $item)
         {
           $find = \Kodami\Models\Mysql\RekeningBank::select('rekening_bank.*')->join('bank', 'bank.id', 'rekening_bank.bank_id')->where('bank.nama', 'LIKE', strtoupper($item->bank_type))->first();
           if($find)
           {
              $find                = \Kodami\Models\Mysql\RekeningBank::where('id', $find->id)->first();
              $find->username      = $item->username;
              $find->owner         = $item->atas_nama;
              $find->no_rekening   = $item->account_number;
              $find->moota_bank_id = $item->bank_id;
              $find->is_active     = $item->is_active;
              $find->last_update   = $item->last_update;
              $find->save();

              echo " BANK : ". strtoupper($item->bank_type) ." \n";
              echo " NO REKENING : ". strtoupper($item->account_number) ." \n";
              echo " ATAS NAMA : ". strtoupper($item->atas_nama) ." \n\n";
           }
           else
           {
              // find type bank
              $bank_id             = \Kodami\Models\Mysql\Bank::where('nama', $item->bank_type)->first();
              if($bank_id)
              {
                $bank_id = $bank_id->id;
              }
              else
              {
                $bank_id = 0;
              }

              $find                = new \Kodami\Models\Mysql\RekeningBank();
              $find->username      = $item->username;
              $find->owner         = $item->atas_nama;
              $find->no_rekening   = $item->account_number;
              $find->moota_bank_id = $item->bank_id;
              $find->is_active     = $item->is_active;
              $find->last_update   = $item->last_update;
              $find->bank_id       = $bank_id;
              $find->save();

              echo " ADD NEW BANK \n";
              echo " BANK : ". strtoupper($item->bank_type) ." \n";
              echo " NO REKENING : ". strtoupper($item->account_number) ." \n";
              echo " ATAS NAMA : ". strtoupper($item->atas_nama) ." \n\n";
           }
         }
       }else{
         echo "Error GET API MOOTA \n";
       }
    }
}
