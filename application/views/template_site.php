<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Enquetes, Preço: grátis, Pesquisas, Geolocalização, Opiniãopop, Pública, Privada, Feed-back, Pós-venda, Pós-atendimento, Pesquisa interna, Pesquisa externa" />
    <meta name="robots" content="index, follow" />
	<meta name="googlebot" content="index, follow" />
	
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    <title>{titulo}</title>
    <link rel="icon" href="<?php echo base_url('img/logo/opiniaopop-black.png') ?>" type="image/png" sizes="16x16">

    <!-- Bootstrap -->
    {headerinc}
    <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
    <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Hotjar Tracking Code for opiniaopop.com.br -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:513037,hjsv:5};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
</script>
  </head>
  <body id="page-top">
    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-toggleable-md navbar-light" id="mainNav">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="<?php echo base_url('site/img/logo/opiniaopop.png') ?>" /> Opiniãopop</a>
            <div class="collapse navbar-collapse" id="navbarExample">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Sobre</a>
                    </li>
				<!--
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Serviços</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#planos">Planos</a>
                    </li>                    
                    <li class="nav-item">
                        <a class="nav-link" href="#portfolio">PArceiros</a>
                    </li>
                    -->
                    <li class="nav-item">
                        <a class="nav-link" href="#planos">Planos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('dashboard') ?>">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contato</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    {conteudo}
  	<!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    {footerinc}

  </body>
</html>
