<div class="tab-content">
    <!-- PLAYBACK PANEL -->
    <div id="playback" class="tab-pane active">
        <div class="container-fluid">
            <div class="knobs row">
                <div id="song-knob" class="col-sm-6">
                    <span id="currentartist"><i class="fa fa-spinner fa-spin"></i></span>
                    <span id="currentsong"><i class="fa fa-spinner fa-spin"></i></span>
                    <span id="currentalbum"><i class="fa fa-spinner fa-spin"></i></span>
                    <div id="overlay-playsource-open" title="Changer la source de lecture" <?php if ($this->spotify === '0'): ?>class="disabled"<?php endif; ?>>
                        <span id="playlist-position"><button class="btn btn-default btn-xs">MPD</button><span></span></span>
                        <span id="format-bitrate"><i class="fa fa-spinner fa-spin"></i></span>
                    </div>
                    <div id="song-buttons" class="btn-group">
                        <button id="repeat" class="btn btn-default btn-lg btn-cmd btn-toggle" type="button" title="Lecture en boucle" data-cmd="repeat"><i class="fa fa-repeat"></i></button>
                        <button id="random" class="btn btn-default btn-lg btn-cmd btn-toggle" type="button" title="Lecture aléatoire" data-cmd="random"><i class="fa fa-random"></i></button>
                        <button id="single" class="btn btn-default btn-lg btn-cmd btn-toggle <?php if ($this->activePlayer === 'Spotify'): ?>disabled<?php endif; ?>" type="button" title="Répéter ce titre" data-cmd="single"><i class="fa fa-refresh"></i></button>
                        <!--<button type="button" id="consume" class="btn btn-default btn-lg btn-cmd btn-toggle" title="Consume Mode" data-cmd="consume"><i class="fa fa-compress"></i></button>-->
                    </div>
                </div>
                <!--div id="time-knob" class="col-sm-<?=($this->colspan)-3 ?>">
                    <input id="time" value="0" data-width="230" data-height="230" data-bgColor="#34495E" data-fgcolor="#0095D8" data-thickness="0.30" data-min="0" data-max="1000" data-displayInput="false" data-displayPrevious="true">
                    <span id="countdown-display"><i class="fa fa-spinner fa-spin"></i></span>
                    <span id="total"><i class="fa fa-spinner fa-spin"></i></span>
                </div-->
                <?php if ($this->coverart == 1): ?>
                <div class="col-sm-6 coverart">
                    <img id="cover-art" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="transparent-square">
                    <!--<a href="#" id="overlay-playsource-open" class="btn btn-default" title="Play source">MPD</a>-->
                </div>
                <?php endif ?>
                <!--div id="volume-knob" class="col-sm-<?=$this->colspan ?> <?=$this->volume['divclass'] ?>">
                    <input id="volume" value="100" data-width="230" data-height="230" data-bgColor="#f00" data-thickness=".25" data-skin="tron" data-cursor="true" data-angleArc="250" data-angleOffset="-125" data-readOnly="<?=$this->volume['readonly'] ?>" data-fgColor="<?=$this->volume['color'] ?>" <?php if (isset($this->volume['disabled'])): ?> disabled="disabled" <?php endif ?>>
                    <div class="btn-group">
                        <button id="volumedn" class="btn btn-default btn-lg btn-cmd btn-volume" type="button" <?php if (isset($this->volume['disabled'])): ?> disabled="disabled" <?php endif ?> title="Volume down" data-cmd="volumedn"><i class="fa fa-volume-down"></i></button>
                        <button id="volumemute" class="btn btn-default btn-lg btn-cmd btn-volume" type="button" <?php if (isset($this->volume['disabled'])): ?> disabled="disabled" <?php endif ?> title="Volume mute/unmute" data-cmd="volumemute"><i class="fa fa-volume-off"></i> <i class="fa fa-exclamation"></i></button>
                        <button id="volumeup" class="btn btn-default btn-lg btn-cmd btn-volume" type="button" <?php if (isset($this->volume['disabled'])): ?> disabled="disabled" <?php endif ?> title="Volume up" data-cmd="volumeup"><i class="fa fa-volume-up"></i></button>
                    </div>
                </div-->
            </div>
        </div>
    </div>
    <!-- LIBRARY PANEL -->
    <div id="panel-sx" class="tab-pane">
        <div class="btnlist btnlist-top">
            <form id="db-search" class="form-inline" action="javascript:getDB({cmd: 'search', path: GUI.currentpath, browsemode: GUI.browsemode});">
                <div class="input-group">
                    <input id="db-search-keyword" class="form-control" type="text" value="" placeholder="search in DB...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit" title="Rechercher"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
            <button id="db-level-up" class="btn hide" type="button" title="Retour au niveau précédent"><i class="fa fa-arrow-left sx"></i> Précédent</button>
            <button id="db-search-results" class="btn hide" type="button" title="Masquer les résultats de recherche et revenir à la bibliothèque"><i class="fa fa-times sx"></i> Précédent</button>
        </div>
        <div id="database">
            <ul id="database-entries" class="database">
                <!-- DB entries -->
            </ul>
            <div id="home-blocks" class="row">
                <div class="col-sm-12">
                    <h1 class="txtmid">Contenu de la bibliothèque</h1>
                </div>
            </div>
        </div>
        <div class="btnlist btnlist-bottom">
            <div id="db-controls">
                <button id="db-homeSetup" class="btn btn-default hide" type="button" title="Définir la page d'acceuil de la bibliothèque"><i class="fa fa-gear"></i></button>
                <button id="db-firstPage" class="btn btn-default" type="button" title="Retour en haut de page"><i class="fa fa-angle-double-up"></i></button>
                <button id="db-prevPage" class="btn btn-default" type="button" title="Défiler page vers le haut"><i class="fa fa-angle-up"></i></button>
                <button id="db-nextPage" class="btn btn-default" type="button" title="Défiler page vers le bas"><i class="fa fa-angle-down"></i></button>
                <button id="db-lastPage" class="btn btn-default" type="button" title="Retour en bas de page"><i class="fa fa-angle-double-down"></i></button>
            </div>
            <div id="db-currentpath">
                <i class="fa fa-folder-open"></i> <span>Acceuil</span>
            </div>
        </div>
        <div id="spinner-db" class="csspinner duo hide"></div>
    </div>
    <!-- QUEUE PANEL -->
    <div id="panel-dx" class="tab-pane">
        <div class="btnlist btnlist-top">
            <form id="pl-search" class="form-inline" method="post" onSubmit="return false;" role="form">
                <div class="input-group">
                    <input id="pl-filter" class="form-control ttip" type="text" value="" placeholder="search in queue..." data-placement="bottom" data-toggle="tooltip" data-original-title="Saisissez un mot à rechercher">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" title="Recherche"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
            <button id="pl-filter-results" class="btn hide" type="button" title="Masquer les résultats de recherche et revenir à la liste de lecture"><i class="fa fa-times sx"></i> Précédent</button>
            <span id="pl-count" class="hide">2143 entries</span>
        </div>
        <div id="playlist">
            <ul id="playlist-entries" class="playlist">
                <!-- playing queue entries -->
            </ul>
            <ul id="pl-editor" class="playlist hide">
                <!-- playlists -->
            </ul>
            <ul id="pl-detail" class="playlist hide">
                <!-- playlist entries -->
            </ul>
            <div id="playlist-warning" class="playlist hide">
                <div class="col-sm-12">
                    <h1 class="txtmid">File de lecture</h1>
                </div>
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="empty-block">
                        <i class="fa fa-exclamation"></i>
                        <h3>Liste vide</h3>
                        <p>Ajouter des entrées depuis votre bibliothèque</p>
                        <p><a id="open-library" href="#panel-sx" class="btn btn-primary btn-lg" data-toggle="tab">Parcourir la bibliothèque</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="btnlist btnlist-bottom">
            <div id="pl-controls">
                <button id="pl-firstPage" class="btn btn-default" type="button" title="Retour en haut de page"><i class="fa fa-angle-double-up"></i></button>
                <button id="pl-prevPage" class="btn btn-default" type="button" title="Défiler une page vers le haut"><i class="fa fa-angle-up"></i></button>
                <button id="pl-nextPage" class="btn btn-default" type="button" title="Défiler une page vers le bas"><i class="fa fa-angle-down"></i></button>
                <button id="pl-lastPage" class="btn btn-default" type="button" title="Retour en bas de page"><i class="fa fa-angle-double-down"></i></button>
            </div>
            <div id="pl-manage">
                <button id="pl-manage-list" class="btn btn-default" type="button" title="Gérer les listes de lecture"><i class="fa fa-file-text-o"></i></button>
                <button id="pl-manage-save" class="btn btn-default" type="button" title="Sauvegarder liste courante comme liste de lecture" data-toggle="modal" data-target="#modal-pl-save"><i class="fa fa-save"></i></button>
                <button id="pl-manage-clear" class="btn btn-default" type="button" title="Vider la file de lecture" data-toggle="modal" data-target="#modal-pl-clear"><i class="fa fa-trash-o"></i></button>
            </div>
            <div id="pl-currentpath" class="hide">
                <i class="fa fa-folder-open"></i>
                <span>Listes de lecture</span>
            </div>
        </div>
        <div id="spinner-pl" class="csspinner duo hide"></div>
    </div>
</div>
<div id="context-menus">
    <div id="context-menu" class="context-menu">
        <ul class="dropdown-menu" role="menu">
            <li><a href="javascript:;" data-cmd="Ajouter"><i class="fa fa-plus-circle sx"></i> Ajouter</a></li>
            <li><a href="javascript:;" data-cmd="Ajouterplay"><i class="fa fa-play sx"></i> Ajouter et lire</a></li>
            <li><a href="javascript:;" data-cmd="Ajouterreplaceplay"><i class="fa fa-share-square-o sx"></i> Ajouter, remplacer et lire</a></li>
            <li><a href="javascript:;" data-cmd="update"><i class="fa fa-refresh sx"></i> Mettre a jour</a></li>
            <li><a href="javascript:;" data-cmd="bookmark"><i class="fa fa-star sx"></i> Sauvegarder en signet</a></li>
        </ul>
    </div>
    <div id="context-menu-file" class="context-menu">
        <ul class="dropdown-menu" role="menu">
            <li><a href="javascript:;" data-cmd="Ajouter"><i class="fa fa-plus-circle sx"></i> Ajouter</a></li>
            <li><a href="javascript:;" data-cmd="Ajouterplay"><i class="fa fa-play sx"></i> Ajouter et lire</a></li>
            <li><a href="javascript:;" data-cmd="Ajouterreplaceplay"><i class="fa fa-share-square-o sx"></i> Ajouter, remplacer et lire</a></li>
        </ul>
    </div>
    <div id="context-menu-dirble" class="context-menu">
        <ul class="dropdown-menu" role="menu">
            <li><a href="javascript:;" data-cmd="wrAjouter"><i class="fa fa-plus-circle sx"></i> Ajouter</a></li>
            <li><a href="javascript:;" data-cmd="wrAjouterplay"><i class="fa fa-play sx"></i> Ajouter et lire</a></li>
            <li><a href="javascript:;" data-cmd="wrAjouterreplaceplay"><i class="fa fa-share-square-o sx"></i> Ajouter, remplacer et lire</a></li>
            <li><a href="javascript:;" data-cmd="wrsave"><i class="fa fa-microphone sx"></i> Sauvegarder comme WebRadio</a></li>
        </ul>
    </div>
	<div id="context-menu-spotify-pl" class="context-menu">
        <ul class="dropdown-menu" role="menu">
            <li><a href="javascript:;" data-cmd="spAjouter" data-type="spotify-playlist"><i class="fa fa-plus-circle sx"></i> Ajouter</a></li>
            <li><a href="javascript:;" data-cmd="spAjouterplay" data-type="spotify-playlist"><i class="fa fa-play sx"></i> Ajouter et lire</a></li>
            <li><a href="javascript:;" data-cmd="spAjouterreplaceplay" data-type="spotify-playlist"><i class="fa fa-share-square-o sx"></i> Ajouter, remplacer et lire</a></li>
        </ul>
    </div>
	<div id="context-menu-spotify" class="context-menu">
        <ul class="dropdown-menu" role="menu">
            <li><a href="javascript:;" data-cmd="spAjouter" data-type="spotify-track"><i class="fa fa-plus-circle sx"></i> Ajouter</a></li>
            <li><a href="javascript:;" data-cmd="spAjouterplay" data-type="spotify-track"><i class="fa fa-play sx"></i> Ajouter et lire</a></li>
            <li><a href="javascript:;" data-cmd="spAjouterreplaceplay" data-type="spotify-track"><i class="fa fa-share-square-o sx"></i> Ajouter, remplacer et lire</a></li>
        </ul>
    </div>
    <div id="context-menu-webradio" class="context-menu">
        <ul class="dropdown-menu" role="menu">
            <li><a href="javascript:;" data-cmd="Ajouter"><i class="fa fa-plus-circle sx"></i> Ajouter</a></li>
            <li><a href="javascript:;" data-cmd="Ajouterplay"><i class="fa fa-play sx"></i> Ajouter et lire</a></li>
            <li><a href="javascript:;" data-cmd="Ajouterreplaceplay"><i class="fa fa-share-square-o sx"></i> Ajouter, remplacer et lire</a></li>
            <li><a href="javascript:;" data-cmd="wredit"><i class="fa fa-edit sx"></i> Modifier</a></li>
            <li><a href="javascript:;" data-cmd="wrdelete"><i class="fa fa-trash-o sx"></i> Supprimer</a></li>
        </ul>
    </div>
    <div id="context-menu-playlist" class="context-menu">
        <ul class="dropdown-menu" role="menu">
            <li><a href="javascript:;" data-cmd="pl-Ajouter"><i class="fa fa-plus-circle sx"></i> Ajouter à la file</a></li>
            <li><a href="javascript:;" data-cmd="pl-replace"><i class="fa fa-undo sx"></i> Remplacer la file</a></li>
            <li><a href="javascript:;" data-cmd="pl-rename"><i class="fa fa-edit sx"></i> Renommer</a></li>
            <li><a href="javascript:;" data-cmd="pl-rm"><i class="fa fa-trash-o sx"></i> Supprimer</a></li>
        </ul>
    </div>
    <div id="context-menu-album" class="context-menu">
        <ul class="dropdown-menu" role="menu">
            <li><a href="javascript:;" data-cmd="albumAjouter"><i class="fa fa-plus-circle sx"></i> Ajouter</a></li>
            <li><a href="javascript:;" data-cmd="albumAjouterplay"><i class="fa fa-play sx"></i> Ajouter et lire</a></li>
            <li><a href="javascript:;" data-cmd="albumAjouterreplaceplay"><i class="fa fa-share-square-o sx"></i> Ajouter, remplacer et lire</a></li>
        </ul>
    </div>
</div>
<div id="modal-pl-save" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-pl-save-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" id="modal-pl-save-label">Sauvegarder file courante en liste de lecture</h3>
            </div>
            <div class="modal-body">
                <label for="pl-save-name">Donner un nom à cette liste de lecture</label>
                <input id="pl-save-name" class="form-control" type="text" placeholder="Enter playlist name">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Fermer</button>
                <button type="button" id="modal-pl-save-btn" class="btn btn-primary btn-lg" data-dismiss="modal">Sauvegarder liste de lecture</button>
            </div>
        </div>
    </div>
</div>
<div id="modal-pl-clear" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-pl-clear-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" id="modal-pl-clear-label">Vider la file de lecture</h3>
            </div>
            <div class="modal-body">
                Cette opération supprimera tous les morceaux dans la file.<br>
                Voulez-vous continuer?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Non</button>
                <button type="button" class="btn btn-primary btn-lg btn-cmd" data-cmd="clear" data-dismiss="modal">Oui</button>
            </div>
        </div>
    </div>
</div>
<div id="modal-pl-rename" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-pl-rename-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" id="modal-pl-rename-label">Renommer la liste de lecture</h3>
            </div>
            <div class="modal-body">
                <label for="pl-rename-name">Renommer la liste "<strong id="pl-rename-oldname"></strong>" en:</label>
                <input id="pl-rename-name" class="form-control" type="text" placeholder="Enter playlist name">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Fermer</button>
                <button id="pl-rename-button" type="button" class="btn btn-primary btn-lg" data-dismiss="modal">Renommer</button>
            </div>
        </div>
    </div>
</div>
<div id="modal-webradio-Ajouter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-webradio-Ajouter-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" id="modal-pl-webradio-Ajouter">Ajouter une WebRadio</h3>
            </div>
            <div class="modal-body">
                <label for="webradio-Ajouter-name">Nom de la radio</label>
                <input id="webradio-Ajouter-name" name="radio[label]" class="form-control" type="text" placeholder="Entrez le nom de la WebRadio">
                <br>
                <label for="webradio-Ajouter-url">URL de la radio</label>
                <input id="webradio-Ajouter-url" name="radio[label]" class="form-control" type="text" placeholder="Entrez l'adresse de la WebRadio">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Fermer</button>
                <button id="webradio-Ajouter-button" type="button" class="btn btn-primary btn-lg">Ajouter à la bibliothèque</button>
            </div>
        </div>
    </div>
</div>
<div id="modal-webradio-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-webradio-edit-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" id="modal-pl-webradio-edit">Modifier la WebRadio</h3>
            </div>
            <div class="modal-body">
                <input id="webradio-edit-oldname" name="radio[oldlabel]" class="form-control" type="hidden" value="">
                <label for="webradio-edit-name">Nom de la radio</label>
                <input id="webradio-edit-name" name="radio[label]" class="form-control" type="text" placeholder="Entrez le nom de la WebRadio">
                <br>
                <label for="webradio-edit-url">URL de la radio</label>
                <input id="webradio-edit-url" name="radio[label]" class="form-control" type="text" placeholder="Entrez l'adresse de la WebRadio">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Fermer</button>
                <button id="webradio-edit-button" type="button" class="btn btn-primary btn-lg" data-dismiss="modal">Sauvegarder</button>
            </div>
        </div>
    </div>
</div>
<div id="modal-webradio-delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-webradio-delete-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" id="modal-pl-webradio-delete">Supprimer la WebRadio</h3>
            </div>
            <div class="modal-body">
                <p><strong id="webradio-delete-name">Radio.pls</strong><br>
                Supprimer cette radio de la bibliothèque ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Fermer</button>
                <button id="webradio-delete-button" type="button" class="btn btn-primary btn-lg" data-dismiss="modal">Supprimer</button>
            </div>
        </div>
    </div>
</div>
<div id="overlay-social" class="overlay-scale closed">
    <nav>
        <ul>
            <li><span>Share this track</span></li>
            <li><a id="urlTwitter" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="btn btn-default btn-lg btn-block share-twitter" href="#"><i class="fa fa-twitter sx"></i> Share on Twitter</a></li>
            <li><a id="urlFacebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="btn btn-default btn-lg btn-block share-facebook" href="#"><i class="fa fa-facebook sx"></i> Share on Facebook</a></li>
            <li><a id="urlGooglePlus" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="btn btn-default btn-lg btn-block share-google-plus" href="#"><i class="fa fa-google-plus sx"></i> Share on Google+</a></li>
            <li><a id="support-us" class="btn btn-default btn-lg btn-block" href="http://www.runeaudio.com/support-us/" target="_blank"><i class="fa fa-heart sx"></i> Support RuneAudio</a></li>
            <li><button id="overlay-social-close" class="btn btn-link" type="button"><i class="fa fa-times"></i> close this layer</button></li>
        </ul>
    </nav>
</div>
<div id="overlay-playsource" class="overlay-scale closed">
    <nav>
        <ul>
            <li><span>Source de lecture</span></li>
			<li><a href="javascript:;" id="playsource-mpd" class="btn btn-default btn-lg btn-block" title="Passer à MPD"><i class="fa fa-linux sx"></i> MPD</a></li>
			<li><a href="javascript:;" id="playsource-spotify" class="btn btn-default btn-lg btn-block inactive" title="Passer à Spotify"><i class="fa fa-spotify sx"></i> <span>spop</span> Spotify</a></li>
			<li><a href="javascript:;" id="playsource-airplay" class="btn btn-default btn-lg btn-block inactive"><i class="fa fa-apple sx"></i> <span>ShairPort</span> Airplay</a></li>
			<li><a href="javascript:;" id="playsource-dlna" class="btn btn-default btn-lg btn-block inactive"><i class="fa fa-puzzle-piece sx"></i> <span>upmpdcli</span> DLNA</a></li>
            <li><button id="overlay-playsource-close" class="btn btn-link" type="button"><i class="fa fa-times"></i> Fermer cette fenêtre</button></li>
        </ul>
    </nav>
</div>
