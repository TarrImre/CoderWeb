
    <section class="hero-little">
        <div class="container hero-content">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="title text-white text-uppercase">
                        Bemutatkozás
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <section class="context-section">
        <div class="container">
            <nav class="breadcrumb py-5">
                <a href="<?=base_url('bemutatkozas')?>">Kezdőlap</a>
                <img src="assets/images/icons/double-arrow.svg" alt="Nyíl" class="img-fluid px-2" />
                <a href="javascript:void(0)">Bemutatkozás</a>
            </nav>

            <?php $content_15 = getContentByID(15); ?>
            <h2 class="title pb-3 text-uppercase"><?=$content_15['title'];?></h2>
            <div class="context">
                <div class="default-text weight-500 size-20 line-height-160 dark-main-text"><?=$content_15['content'];?></div>

                <?php foreach ($contentRow as $item):?>
                <div class="row py-5 bemutatkozasrow">
                    <div class="col-md-5 d-flex align-items-center">
                        <img src="<?=base_url('assets/uploads/slideshow/').$item['filename'];?>" alt="<?=$item['name'];?>"
                            class="img-fluid image-radius-15" />
                    </div>
                    <div class="col-md-7 d-flex align-items-center">
                        <div>
                            <h3 class="title text-uppercase pt-sm-3 pt-md-0 pt-lg-0"><?=$item['name'];?></h3>
                            <div class="default-text weight-400 size-18 line-height-160 pt-2 dark-sub-text"><?=$item['desc'];?></div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </section>