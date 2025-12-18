<?php  
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
?>


<div id="rivista_tabs" class="tab-wrapper">
    <ul class="nav nav-tabs" id="rivistaTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="scheda-tab" data-bs-toggle="tab" data-bs-target="#scheda-tab-pane" type="button" role="tab" aria-controls="scheda-tab-pane" aria-selected="true">Scheda</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="formato-tab" data-bs-toggle="tab" data-bs-target="#formato-tab-pane" type="button" role="tab" aria-controls="formato-tab-pane" aria-selected="false">Formati e Caratteristiche tecniche</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="calendario-tab" data-bs-toggle="tab" data-bs-target="#calendario-tab-pane" type="button" role="tab" aria-controls="calendario-tab-pane" aria-selected="false">Calendario</button>
        </li>
    </ul>
    <div class="tab-content" id="rivistaTabContent">
        <div class="tab-pane fade show active" id="scheda-tab-pane" role="tabpanel" aria-labelledby="scheda-tab" tabindex="0">
            <?php     
            $magazineduesse_rivista_scheda_tab = get_term_meta($term_id, 'magazineduesse_rivista_scheda_tab', true);
            echo apply_filters('pincuter_meta_content',$magazineduesse_rivista_scheda_tab);
            ?>
        </div>
        <div class="tab-pane fade" id="formato-tab-pane" role="tabpanel" aria-labelledby="formato-tab" tabindex="0">
            <?php     
            $magazineduesse_rivista_formato_tab = get_term_meta($term_id, 'magazineduesse_rivista_formato_tab', true);
            echo apply_filters('pincuter_meta_content',$magazineduesse_rivista_formato_tab);
            ?>
        </div>
        <div class="tab-pane fade" id="calendario-tab-pane" role="tabpanel" aria-labelledby="calendario-tab" tabindex="0">
            <?php     
            $magazineduesse_rivista_calendario_tab = get_term_meta($term_id, 'magazineduesse_rivista_calendario_tab', true);
            echo apply_filters('pincuter_meta_content',$magazineduesse_rivista_calendario_tab);
            ?>
        </div>
    </div>
</div>