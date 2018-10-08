@extends('layout.app')

@section('title', 'Kodami Pocket System - Koperasi Daya Masyarakat Indonesia')

@section('sidebar')

@endsection

@section('content')
 
    <div class="content-header">
        <div class="content-title">
            <h1>KODAMI System</h1>
            <h2><span>Koperasi Daya Masyarakat Indonesia<br></span></h2>
            <div>
                <a href="<?=url('register')?>" class="tombol-register">Register</a>
                <a href="<?=url('signin')?>" class="tombol-signin">Sign in</a>
            </div>
        </div>
    </div>
    <svg viewBox="0 0 1280 70" preserveAspectRatio="none" id="headerCurve" fill="blue" role="presentation" aria-hidden="true">
        <polygon points="1280 0 1280 70 0 70" fill="rgb(34,34,34)"></polygon>
    </svg>
    <div class="section1">
        <h1>Focus on what matters</h1>
        <h2>
            <span>Kodami memberikan solusi kepada Usaha Anda,<br></span>
            <span>kami fokus memberikan layanan untuk Penjualan, Permodalan dan Perkembangan Bisnis Anda<br></span>
        </h2>
        <br/>
    </div>

@endsection