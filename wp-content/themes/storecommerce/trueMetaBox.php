<?php
class trueMetaBox {
    function __construct($options) {
        $this->options = $options;
        $this->prefix = $this->options['id'] .'_';
        add_action( 'add_meta_boxes', array( &$this, 'create' ) );
        add_action( 'save_post', array( &$this, 'save' ), 1, 2 );
    }
    function create() {
        foreach ($this->options['post'] as $post_type) {
            if (current_user_can( $this->options['cap'])) {
                add_meta_box($this->options['id'], $this->options['name'], array(&$this, 'fill'), $post_type, $this->options['pos'], $this->options['pri']);
            }
        }
    }
    function fill(){
        global $post; $p_i_d = $post->ID;
        wp_nonce_field( $this->options['id'], $this->options['id'].'_wpnonce', false, true );
        ?>
        <table class="form-table"><tbody><?php
        foreach ( $this->options['args'] as $param ) {
            if (current_user_can( $param['cap'])) {
                ?><tr><?php
                if(!$value = get_post_meta($post->ID, $this->prefix .$param['id'] , true)) $value = $param['std'];
                switch ( $param['type'] ) {
                    case 'text':{ ?>
                        <th scope="row"><label for="<?php echo $this->prefix .$param['id'] ?>"><?php echo $param['title'] ?></label></th>
                        <td>
                            <input name="<?php echo $this->prefix .$param['id'] ?>" type="<?php echo $param['type'] ?>" id="<?php echo $this->prefix .$param['id'] ?>" value="<?php echo $value ?>" placeholder="<?php echo $param['placeholder'] ?>" class="regular-text" /><br />
                            <span class="description"><?php echo $param['desc'] ?></span>
                        </td>
                        <?php
                        break;
                    }
                    case 'textarea':{ ?>
                        <th scope="row"><label for="<?php echo $this->prefix .$param['id'] ?>"><?php echo $param['title'] ?></label></th>
                        <td>
                            <textarea name="<?php echo $this->prefix .$param['id'] ?>" type="<?php echo $param['type'] ?>" id="<?php echo $this->prefix .$param['id'] ?>" value="<?php echo $value ?>" placeholder="<?php echo $param['placeholder'] ?>" class="large-text" /><?php echo $value ?></textarea><br />
                            <span class="description"><?php echo $param['desc'] ?></span>
                        </td>
                        <?php
                        break;
                    }
                    case 'checkbox':{ ?>
                        <th scope="row"><label for="<?php echo $this->prefix .$param['id'] ?>"><?php echo $param['title'] ?></label></th>
                        <td>
                            <label for="<?php echo $this->prefix .$param['id'] ?>"><input name="<?php echo $this->prefix .$param['id'] ?>" type="<?php echo $param['type'] ?>" id="<?php echo $this->prefix .$param['id'] ?>"<?php echo ($value=='on') ? ' checked="checked"' : '' ?> />
                                <?php echo $param['desc'] ?></label>
                        </td>
                        <?php
                        break;
                    }
//                    case 'map':{ ?>
<!--                        <iframe src="https://www.google.com/maps/embed-->
<!--                        ?pb=!1m14!1m12!1m3!1d72083.2269139535!2d35.15310026593847!3d47.823919782999184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sua!4v1563062510108!5m2!1sru!2sua"-->
<!--                                width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>-->
<!--                        --><?php
//                        break;
//                    }
                    case 'select':{ ?>
                        <th scope="row"><label for="<?php echo $this->prefix .$param['id'] ?>"><?php echo $param['title'] ?></label></th>
                        <td>
                            <label for="<?php echo $this->prefix .$param['id'] ?>">
                                <select name="<?php echo $this->prefix .$param['id'] ?>" id="<?php echo $this->prefix .$param['id'] ?>"><option>...</option><?php
                                    foreach($param['args'] as $val=>$name){
                                        ?><option value="<?php echo $val ?>"<?php echo ( $value == $val ) ? ' selected="selected"' : '' ?>><?php echo $name ?></option><?php
                                    }
                                    ?></select></label><br />
                            <span class="description"><?php echo $param['desc'] ?></span>
                        </td>
                        <?php
                        break;
                    }
                }
                ?></tr><?php
            }
        }
        ?></tbody></table><?php
    }
    function save($post_id, $post){
        if ( !wp_verify_nonce( $_POST[ $this->options['id'].'_wpnonce' ], $this->options['id'] ) ) return;
        if ( !current_user_can( 'edit_post', $post_id ) ) return;
        if ( !in_array($post->post_type, $this->options['post'])) return;
        foreach ( $this->options['args'] as $param ) {
            if ( current_user_can( $param['cap'] ) ) {
                if ( isset( $_POST[ $this->prefix . $param['id'] ] ) && trim( $_POST[ $this->prefix . $param['id'] ] ) ) {
                    update_post_meta( $post_id, $this->prefix . $param['id'], trim($_POST[ $this->prefix . $param['id'] ]) );
                } else {
                    delete_post_meta( $post_id, $this->prefix . $param['id'] );
                }
            }
        }
    }
}