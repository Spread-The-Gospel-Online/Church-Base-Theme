<?php

if (class_exists('WP_Customize_Control')) {
    class Drag_And_Drop_Custom_Control extends WP_Customize_Control {

        //The type of control being rendered
        public $type = 'drag_and_drop';

        public static function validate_drag_and_drop ($input) {
            return $input;
        }

        //Render the control in the customizer
        public function render_content() { ?>
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
                <input type="hidden" id="_customize-input-<?= $this->id ?>" value="a,b,c" />
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