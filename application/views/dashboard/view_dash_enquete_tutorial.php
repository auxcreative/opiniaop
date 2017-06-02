<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
	
	$step = $this->uri->segment(4);

 ?>
<div class="container-fluid">
	<div class="card card-mini">
		<div class="card-header">
			<?php breadcrumb(); ?>
		</div>
		<div class="card-body">
			<div class="row">
				<?php get_msg('msgok'); get_msg('msgerro'); ?>				
			</div>
			<div class="container-fluid">
			          <div class="section">
            <div class="section-body">
              <div class="step">
    <ul class="nav nav-tabs nav-justified" role="tablist">
        <li role="step" class="<?php echo ($step == '' || $step == 'passo-1') ? 'active' : '';  ?>">
            <a href="#step1" id="step1-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
                <div class="icon fa fa-quote-left"></div>
                <div class="heading">
                    <div class="title">1 - Pergunta</div>
                    <div class="description">Crie sua pergunta</div>
                </div>
            </a>
        </li>
        <li role="step" class="<?php echo ( $step == 'passo-2') ? 'active' : '';  ?>">
            <a href="#step2" role="tab" id="step2-tab" data-toggle="tab" aria-controls="profile">
                <div class="icon fa fa-pencil-square-o"></div>
                <div class="heading">
                    <div class="title">2 - Respostas</div>
                    <div class="description">Crie suas respostas</div>
                </div>
            </a>
        </li>
        <li role="step" class="<?php echo ($step == 'passo-3') ? 'active' : '';  ?>">
            <a href="#step3" role="tab" id="step3-tab" data-toggle="tab" aria-controls="profile">
                <div class="icon fa fa-share-alt-square"></div>
                <div class="heading">
                    <div class="title">3 - Compartilhar</div>
                    <div class="description">Compartilhe suas enquete</div>
                </div>
            </a>
        </li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane <?php echo ($step == 'passo-1' || $step == '' ) ? 'active' : '';  ?>" id="step1">
            <b>Passo 1</b> : Crie a pergunta para sua enquete<br />
            <form action="<?php echo base_url('dashboard/enquete#step2'); ?>">
            	
            </form>
        </div>
        <div role="tabpanel" class="tab-pane <?php echo ($step == 'passo-2') ? 'active' : '';  ?>" id="step2">
            <b>Passo 2</b> : Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore
        </div>
        <div role="tabpanel" class="tab-pane <?php echo ($step == 'passo-3') ? 'active' : '';  ?>" id="step3">
            <b>Passo 3</b> : Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum
        </div>
    </div>
</div>
            </div>
          </div>

				</div>
				
			</div>
		</div>
	</div>
