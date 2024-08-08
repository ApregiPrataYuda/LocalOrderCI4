<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Error 404 - Page Not Found</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<link rel="stylesheet" href="<?= base_url() ?>assets/backend/plugins/fontawesome-free/css/all.min.css">

<link rel="stylesheet" href="<?= base_url() ?>assets/backend/dist/css/adminlte.min.css?v=3.2.0">
<script nonce="a2ecd6bb-d014-4613-8be9-78e6426ff25d">try{(function(w,d){!function(mo,mp,mq,mr){mo[mq]=mo[mq]||{};mo[mq].executed=[];mo.zaraz={deferred:[],listeners:[]};mo.zaraz.q=[];mo.zaraz._f=function(ms){return async function(){var mt=Array.prototype.slice.call(arguments);mo.zaraz.q.push({m:ms,a:mt})}};for(const mu of["track","set","debug"])mo.zaraz[mu]=mo.zaraz._f(mu);mo.zaraz.init=()=>{var mv=mp.getElementsByTagName(mr)[0],mw=mp.createElement(mr),mx=mp.getElementsByTagName("title")[0];mx&&(mo[mq].t=mp.getElementsByTagName("title")[0].text);mo[mq].x=Math.random();mo[mq].w=mo.screen.width;mo[mq].h=mo.screen.height;mo[mq].j=mo.innerHeight;mo[mq].e=mo.innerWidth;mo[mq].l=mo.location.href;mo[mq].r=mp.referrer;mo[mq].k=mo.screen.colorDepth;mo[mq].n=mp.characterSet;mo[mq].o=(new Date).getTimezoneOffset();if(mo.dataLayer)for(const mB of Object.entries(Object.entries(dataLayer).reduce(((mC,mD)=>({...mC[1],...mD[1]})),{})))zaraz.set(mB[0],mB[1],{scope:"page"});mo[mq].q=[];for(;mo.zaraz.q.length;){const mE=mo.zaraz.q.shift();mo[mq].q.push(mE)}mw.defer=!0;for(const mF of[localStorage,sessionStorage])Object.keys(mF||{}).filter((mH=>mH.startsWith("_zaraz_"))).forEach((mG=>{try{mo[mq]["z_"+mG.slice(7)]=JSON.parse(mF.getItem(mG))}catch{mo[mq]["z_"+mG.slice(7)]=mF.getItem(mG)}}));mw.referrerPolicy="origin";mw.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(mo[mq])));mv.parentNode.insertBefore(mw,mv)};["complete","interactive"].includes(mp.readyState)?zaraz.init():mo.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document)}catch(e){throw fetch("/cdn-cgi/zaraz/t"),e;};</script></head>
<style>
    body {
        background-color: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
        overflow: hidden;
        font-family: 'Source Sans Pro', sans-serif;
    }
    .container {
        text-align: center;
    }
    .error-image {
        max-width: 100%;
        height: auto;
        animation: bounce 2s infinite;
    }
    .error-title {
        font-size: 72px;
        font-weight: 700;
        color: #343a40;
        animation: pulse 1.5s infinite;
    }
    .error-message {
        font-size: 24px;
        color: #6c757d;
    }
    .btn-home {
        margin-top: 20px;
    }

    /* Animation Keyframes */
    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateY(0);
        }
        40% {
            transform: translateY(-30px);
        }
        60% {
            transform: translateY(-15px);
        }
    }
    @keyframes pulse {
        0% {
            color: #343a40;
        }
        50% {
            color: #007bff;
        }
        100% {
            color: #343a40;
        }
    }
</style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <img src="error.png" alt="404 Error" class="error-image img-fluid rounded mt-5">
                <h1 class="error-title">404</h1>
                <p class="error-message">Oops! Page not found.</p>
                <a href="/" class="btn btn-outline-secondary btn-home">Back to Login Page</a>
            </div>
        </div>
    </div>
<script src="<?= base_url() ?>assets/backend/plugins/jquery/jquery.min.js"></script>

<script src="<?= base_url() ?>assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url() ?>assets/backend/dist/js/adminlte.min.js?v=3.2.0"></script>

<script src="<?= base_url() ?>assets/backend/dist/js/demo.js"></script>