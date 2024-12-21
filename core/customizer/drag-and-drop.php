<?php

if (class_exists('WP_Customize_Control')) {
    class Drag_And_Drop_Custom_Control extends WP_Customize_Control {

        //The type of control being rendered
        public $type = 'drag_and_drop';

        public static function validate_drag_and_drop ($input) {
            return $input;
        }

        public function check_option_exists () {
            if (false == get_option($this->id, false)) {
                $values = [];
                foreach ($this->choices as $choice) {
                    $values[] = $choice['value'];
                }
                $values_to_save = $values;
                add_option($this->id, $values_to_save);
            }
        }

        //Render the control in the customizer
        public function render_content() { 
            $this->check_option_exists();
            $split_options = get_option($this->id);
            if ($split_options) {
                for ($i = 0; $i < count($this->choices); $i++) {
                    $this->choices[$i]['sortIndex'] = array_search($this->choices[$i]['value'], $split_options);
                }
                usort($this->choices, function ($a, $b) {
                    return $a['sortIndex'] - $b['sortIndex'];
                }); 
            } ?>
            <div class="drag-and-drop-control" id="<?= $this->id ?>">
                <h4 class="customize-control-title">
                    <?= esc_html($this->label) ?>
                </h4>
                <ul class="sortable-list">
                    <?php foreach ($this->choices as $choice) { ?>
                        <li draggable="true"
                            class="draggable"
                            data-value="<?= $choice['value'] ?>">
                            <?= $choice['label'] ?>
                        </li>
                    <?php } ?>
                </ul>
                
                <script src="<?= get_template_directory_uri() ?>/assets/scripts/templates/drag-and-drop.js"></script>
                <script type="text/javascript">
                    window.setupDragAndDrops('<?= $this->id ?>')
                </script>
            </div>
            <style type="text/css">
                .draggable {
                    padding: 8px;
                    background: white;
                    cursor: grab;
                }

                .draggable.dragging {
                    cursor: grabbing;
                }
            </style>
        <?php }
    }
}