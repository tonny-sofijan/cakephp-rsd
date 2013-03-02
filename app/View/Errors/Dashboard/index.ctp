<!-- begin left content -->
<div class="left-content">					
    <div class="widget tours">
        <h2 class="widget-title"><?php echo __('Tours'); ?></h2>

        <div class="widget-content">
            
            <?php foreach ($tours as $tour): ?>
            <div class="the-content clearfix">
                <div class="tours-image">
                    <?php 
                        if (!empty($tour['AttachmentFile']) && count($tour['AttachmentFile']) > 0) {
                            echo $this->Html->image($this->Constant->getFileBaseDir() . $tour['AttachmentFile']['atf_location'] . "/" . $tour['AttachmentFile']['atf_filename']);
                        } else {
                            echo $this->Html->image('no-image.jpg');
                        }
                    ?>
                </div>
                <div class="title">
                    <?php echo $this->Html->link($tour['Tour']['tour_name'], array('controller' => 'puTours', 'action' => 'view', $tour['Tour']['id']), array('escape' => false)); ?>
                    <br/>
                    <span class="price">
                        <?php echo __('Start from') . ' ' . $tour['Currency']['curr_code']; ?>
                        <?php echo $this->Converter->formatNumber($tour['Tour']['tour_start_price']); ?>
                    </span>
                </div>
            </div>
            <?php endforeach; ?>

<!--            <div class="pagination clearfix">
                <ul>
                    <li class="current"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                </ul>
            </div>-->
        </div>

    </div>
</div>
<!-- end left content -->

<!-- begin right content -->
<div class="right-content">
    <div class="widget culinary">
        <h2 class="widget-title"><?php echo __('Culinary'); ?></h2>

        <div class="widget-content">
            <div class="content-padding">
                <div class="the-content">
                    <div class="title no-float">
                        <span class="title"><a href="#">Bulgogi (Barbecued Beef)</a></span>
                        <span class="price">Rp. 80.000 ,-</span>
                    </div>
                    <div class="text">
                        <i>Pulgogi</i> is one of Korea's most famous grilled dishes. It is made from sirloin or another prime cut of beef (such as top round), cut into thin strips.
                    </div>
                </div>

                <div class="the-content">
                    <div class="title no-float">
                        <span class="title"><a href="#">Gado-gado</a></span>
                        <span class="price">Rp. 10.000 ,-</span>
                    </div>
                    <div class="text">
                        Gado-gado adalah salah satu makanan yang berasal dari Indonesia yang berupa sayur-sayuran yang direbus dan dicampur jadi satu, dengan bumbu kacang.
                    </div>
                </div>

                <div class="the-content">
                    <div class="title no-float">
                        <span class="title"><a href="#">Hokkian Mie</a></span>
                        <span class="price">Rp. 25.000 ,-</span>
                    </div>
                    <div class="text">
                        Untuk penggemar mie, sekali-sekali boleh mencicipi mie dengan bumbu sedikit berbeda ini. Mie hokkian yang tebal dan besar, diperkaya dengan daging ayam.
                    </div>
                </div>

                <a href="#" class="readmore">More..</a>
            </div>
        </div>
    </div>
</div>
<!-- end right content -->

<?php $this->start('accordion'); ?>
<!-- begin slider -->
<h2 class="slider-title">SEPUCUK <span>JAMBI</span> SEMBILAN LURAH</h2>

<div class="bottom-slider">
    <ul id="bottom-slider">
        <li class="slider1">
            <img src="/bluehorizon/theme/frontend/img/budaya.jpg" />
            <div class="slider-title">
                <span>BUDAYA</span>
            </div>
        </li>
        <li class="slider2">
            <img src="/bluehorizon/theme/frontend/img/sejarah.jpg" />
            <div class="slider-title">
                <span>SEJARAH</span>
            </div>
        </li>
        <li class="slider3">
            <img src="/bluehorizon/theme/frontend/img/bottom-slider-1.jpg" />
            <div class="slider-title">
                <span>BAHARI</span>
            </div>
        </li>
        <li class="slider4">
            <img src="/bluehorizon/theme/frontend/img/rumah-adat.jpg" />
            <div class="slider-title">
                <span>RUMAH ADAT</span>
            </div>
        </li>
    </ul>
</div>
<!-- end slider -->
<?php $this->end(); ?>