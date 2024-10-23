<?php

if (class_exists('WP_Customize_Control')) {
    class Sub_Section_Heading_Custom_Control extends WP_Customize_Control {

        //The type of control being rendered
        public $type = 'sub_section_heading';

        //Render the control in the customizer
        public function render_content() { ?>
            <div class="sub-section-heading-control">
                <?php if( !empty( $this->label ) ) { ?>
                    <h4 class="customize-control-title" style="padding: 1rem; text-align: center; background: #333; color: #fff;">
                          <?php echo esc_html( $this->label ); ?>
                    </h4>
                <?php } ?>

            </div>
        <?php }
    }
}