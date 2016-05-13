<div class="container">
    <h1>Sources locales</h1>
    <div class="boxed">
        <p>Votre <a href="/#panel-sx">bibliothèque musicale</a> contient deux types de contenu: <strong>sources locales</strong> et sources streaming.<br>
        Cette section vous permet de configurer vos sources locales, en indiquant à <a href="http://www.musicpd.org/" title="Music Player Daemon" rel="nofollow" target="_blank">MPD</a>
         le contenu à scanner dans les <strong>points de montage réseau</strong> et <strong>USB</strong>.</p>
        <form action="" method="post">
            <button class="btn btn-lg btn-primary" type="submit" name="updatempd" value="1" id="updatempddb"><i class="fa fa-refresh sx"></i>Reconstruire Bibliothèque MPD</button>
        </form>
    </div>
    
    <h2>Sources Réseau</h2>
    <p>Liste des points de montage configurés. Cliquez sur une des entrées pour la modifier, ou ajoutez-en une nouvelle.</p>
    <form id="mount-list" class="button-list" action="" method="post">
        <?php if( !empty($this->mounts) ): ?>
        <p><button class="btn btn-lg btn-primary btn-block" type="submit" name="mountall" value="1" id="mountall"><i class="fa fa-refresh sx"></i> Remonter toutes les sources</button></p>
        <?php foreach($this->mounts as $mount): ?>
        <p><a href="/sources/edit/<?php echo $mount['id']; ?>" class="btn btn-lg btn-default btn-block"> <i class="fa <?php if ($mount['status'] == 1): ?> fa-check green <?php else: ?> fa-times red <?php endif ?> sx"></i> <?php echo $mount['name']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<span>//<?php echo $mount['address']; ?>/<?php echo $mount['remotedir']; ?></span></a></p>
        <?php endforeach; endif; ?>
        <p><a href="/sources/add" class="btn btn-lg btn-primary btn-block" data-ajax="false"><i class="fa fa-plus sx"></i> Ajouter un point de montage</a></p>
    </form>
    
    <h2>Sources USB</h2>
    <p>Liste des disques USB montés. Pour éjecter proprement un disque, cliquez sur celui-ci et confirmer l'éjection dans la fenêtre de confirmation.<br>
    Si un disque est connecté mais n'apparaît pas dans la liste, vérifiez si <a href="/settings/#features-management">automontage USB</a> est activé.</p>
    <div id="usb-mount-list" class="button-list">    
    <?php if( $this->usbmounts !== null ): foreach($this->usbmounts as $usbmount): ?>
        <p><a class="btn btn-lg btn-default btn-block" href="#umount-modal" data-toggle="modal" data-mount="<?=$usbmount->device ?>"><i class="fa fa-check green sx"></i><?=$usbmount->device ?>&nbsp;&nbsp;&nbsp;&nbsp;<?=$usbmount->name ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php if (!empty($usbmount->size)): ?><span>(size:&nbsp;<?=$usbmount->size ?>B,&nbsp&nbsp;<?=$usbmount->use ?>&nbsp;en cours d'utilisation)</span><?php endif; ?></a></p>
    <?php endforeach; ?>
        <form action="" method="post">
            <div id="umount-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="umount-modal-label" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="umount-modal-label">Ejecter disque USB</h4>
                        </div>
                        <div class="modal-body">
                            <p>Point de montage:</p>
                            <pre><span id="usb-umount-name"></span></pre>
                            <p>Voulez-vous éjecter le disque USB ?</p>
                            <input id="usb-umount" class="form-control" type="hidden" value="" name="usb-umount">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-default btn-lg" type="button" data-dismiss="modal" aria-hidden="true">Annuler</button>
                            <button class="btn btn-primary btn-lg" type="submit" value="umount"><i class="fa fa-times sx"></i>Ejecter</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php else: ?>
        <p><button class="btn btn-lg btn-disabled btn-block" disabled="disabled">Aucun montage USB présent</button></p>
    <?php endif; ?>
    </div>
</div>
