<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>
            {{ $title ?? 'Dashboard' }} | Bimbel SMART
        </title>

        <link rel="icon" href="{{ asset('images/favicon.ico') }}">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="https://cdn.lineicons.com/5.0/lineicons.css" rel="stylesheet" />

        <script defer="" referrerpolicy="origin" src="{{ asset('js/s.js') }}"></script>
        <script data-cfasync="false" nonce="2bfddfa5-2c60-48fa-9b25-fb5bce528ab9">try{(function(w,d){!function(j,k,l,m){if(j.zaraz)console.error('zaraz is loaded twice');else{j[l]=j[l]||{};j[l].executed=[];j.zaraz={deferred:[],listeners:[]};j.zaraz._v='5870';j.zaraz._n='2bfddfa5-2c60-48fa-9b25-fb5bce528ab9';j.zaraz.q=[];j.zaraz._f=function(n){return async function(){var o=Array.prototype.slice.call(arguments);j.zaraz.q.push({m:n,a:o})}};for(const p of['track','set','debug'])j.zaraz[p]=j.zaraz._f(p);j.zaraz.init=()=>{var q=k.getElementsByTagName(m)[0],r=k.createElement(m),s=k.getElementsByTagName('title')[0];s&&(j[l].t=k.getElementsByTagName('title')[0].text);j[l].x=Math.random();j[l].w=j.screen.width;j[l].h=j.screen.height;j[l].j=j.innerHeight;j[l].e=j.innerWidth;j[l].l=j.location.href;j[l].r=k.referrer;j[l].k=j.screen.colorDepth;j[l].n=k.characterSet;j[l].o=(new Date).getTimezoneOffset();if(j.dataLayer)for(const t of Object.entries(Object.entries(dataLayer).reduce((u,v)=>({...u[1],...v[1]}),{})))zaraz.set(t[0],t[1],{scope:'page'});j[l].q=[];for(;j.zaraz.q.length;){const w=j.zaraz.q.shift();j[l].q.push(w)}r.defer=!0;for(const x of[localStorage,sessionStorage])Object.keys(x||{}).filter(z=>z.startsWith('_zaraz_')).forEach(y=>{try{j[l]['z_'+y.slice(7)]=JSON.parse(x.getItem(y))}catch{j[l]['z_'+y.slice(7)]=x.getItem(y)}});r.referrerPolicy='origin';r.src='/cdn-cgi/zaraz/s.js?z='+btoa(encodeURIComponent(JSON.stringify(j[l])));q.parentNode.insertBefore(r,q)};['complete','interactive'].includes(k.readyState)?zaraz.init():j.addEventListener('DOMContentLoaded',zaraz.init)}}(w,d,'zarazData','script');window.zaraz._p=async bs=>new Promise(bt=>{if(bs){bs.e&&bs.e.forEach(bu=>{try{const bv=d.querySelector('script[nonce]'),bw=bv?.nonce||bv?.getAttribute('nonce'),bx=d.createElement('script');bw&&(bx.nonce=bw);bx.innerHTML=bu;bx.onload=()=>{d.head.removeChild(bx)};d.head.appendChild(bx)}catch(by){console.error(`Error executing script: ${bu}\n`,by)}});Promise.allSettled((bs.f||[]).map(bz=>fetch(bz[0],bz[1])))}bt()});zaraz._p({'e':['(function(w,d){})(window,document)']});})(window,document)}catch(e){throw fetch('/cdn-cgi/zaraz/t'),e;};</script>
        <script>(function(w,d){})(window,document)</script>
    </head>
    <body
        x-data="{ page: 'dashboard', 'loaded': true, 'darkMode': false, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
        x-init="
            darkMode = JSON.parse(localStorage.getItem('darkMode'));
            $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
        :class="{'dark bg-gray-900': darkMode === true}">

        @include('components.preloader')

        <div class="flex h-screen overflow-hidden">
            @include('components.sidebar')
            <div class="relative flex flex-1 flex-col overflow-x-hidden overflow-y-auto">
                <div :class="sidebarToggle ? 'block xl:hidden' : 'hidden'" class="fixed z-50 h-screen w-full bg-gray-900/50"></div>
                @include('components.navbar')
                <main>
                    <div class="mx-auto max-w-(--breakpoint-2xl) p-4 md:p-6">
                        @yield('content')
                    </div>
                </main>
                </div>
            </div>
        <script defer src="{{ asset('js/bundle.js') }}"></script>
    </body>
</html>
