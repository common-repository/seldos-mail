<?php 
    
    $post = $this->seldos_postSecurty($_POST); 
	extract($post);
    
    $step1R = ['step'];
    if($this->seldos_postControl($step1R) and  $step == 'general'){
        
        update_option( 'seldosmail_smtp_host', $seldosmail_smtp_host,false);
        update_option( 'seldosmail_smtp_host_port', $seldosmail_smtp_host_port,false);
        update_option( 'seldosmail_smtp_host_connect_type', $seldosmail_smtp_host_connect_type,false);
        update_option( 'seldosmail_smtp_user', $seldosmail_smtp_user,false);
        update_option( 'seldosmail_smtp_pass', $seldosmail_smtp_pass,false);
        update_option( 'seldosmail_smtp_sender_mail', $seldosmail_smtp_sender_mail,false);
        update_option( 'seldosmail_smtp_sender_name', $seldosmail_smtp_sender_name,false);
        update_option( 'seldosmail_smtp_user_control', $seldosmail_smtp_user_control,false);
        
    }
    
    $seldosmail_smtp_host = !get_option( 'seldosmail_smtp_host',true)?'':get_option( 'seldosmail_smtp_host' );
    $seldosmail_smtp_host_port = !get_option( 'seldosmail_smtp_host_port',true)?'':get_option( 'seldosmail_smtp_host_port' );
    $seldosmail_smtp_host_connect_type = !get_option( 'seldosmail_smtp_host_connect_type',true)?'':get_option( 'seldosmail_smtp_host_connect_type' );
    $seldosmail_smtp_user = !get_option( 'seldosmail_smtp_user',true)?'':get_option( 'seldosmail_smtp_user' );
    $seldosmail_smtp_pass = !get_option( 'seldosmail_smtp_pass',true)?'':get_option( 'seldosmail_smtp_pass' );
    $seldosmail_smtp_sender_mail = !get_option( 'seldosmail_smtp_sender_mail',true)?'':get_option('seldosmail_smtp_sender_mail');
    $seldosmail_smtp_sender_name = !get_option( 'seldosmail_smtp_sender_name',true)?'':get_option('seldosmail_smtp_sender_name');
    $seldosmail_smtp_user_control = !get_option( 'seldosmail_smtp_user_control',true)?'':get_option('seldosmail_smtp_user_control');
    
?>
<div class="container">
    <div class="seldosseo">
        <div class="pageTitle">
            <h1><?=__('Settings','seldos-mail')?></h1>
        </div>
        
        <form action="" method="post">
        
            <input type="hidden" name="step" value="general" />
            
            <div class="pageContent">
                
                <div class="seldos-tabs pageHeader">
                    <div class="tab active">
                       <?=__('General','seldos-mail')?>
                    </div>
                    <div class="tab">
                       <?=__('Mail Test','seldos-mail')?>
                    </div>
                </div>
                
                <div class="seldos-tabsContent">
                    
                    <div class="tabContent">
                    
                        <div class="col-10">
                            
                            <div class="tabContentHead">
                                <?=__('Host Settings','seldos-mail')?>
                            </div>
                            
                            <div class="col-1">
                                <div class="seldos-formElement">
                                    <div class="radioButton">
                                        <input type="radio" id="seldosmail_smtp_host_connect_type" name="seldosmail_smtp_host_connect_type" value="none" <?=$seldosmail_smtp_host_connect_type=='none'?'checked':''?>/>
                                        <label for="seldosmail_smtp_host_connect_type"><?=__('None','seldos-mail')?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="seldos-formElement">
                                    <div class="radioButton">
                                        <input type="radio" id="seldosmail_smtp_host_connect_type2" name="seldosmail_smtp_host_connect_type" value="tls" <?=$seldosmail_smtp_host_connect_type=='tls'?'checked':''?>/>
                                        <label for="seldosmail_smtp_host_connect_type2"><?=__('TLS','seldos-mail')?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="seldos-formElement">
                                    <div class="radioButton">
                                        <input type="radio" id="seldosmail_smtp_host_connect_type3" name="seldosmail_smtp_host_connect_type" value="ssl" <?=$seldosmail_smtp_host_connect_type=='ssl'?'checked':''?>/>
                                        <label for="seldosmail_smtp_host_connect_type3"><?=__('SSL','seldos-mail')?></label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-5">
                                <div class="seldos-formElement labelUp">
                                    <label for=""><?=__('SMTP HOST','seldos-mail')?></label>
                                    <input type="text" name="seldosmail_smtp_host" placeholder="<?=__('e.g. mail.seldos.com.tr','seldos-mail')?>" value="<?=$seldosmail_smtp_host?>"/>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="seldos-formElement labelUp">
                                    <label for=""><?=__('SMTP HOST PORT','seldos-mail')?></label>
                                    <input type="text" name="seldosmail_smtp_host_port" placeholder="<?=__('e.g. 25','seldos-mail')?>" value="<?=$seldosmail_smtp_host_port?>"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-10">
                            <div class="tabContentHead">
                                <?=__('Login Settings','seldos-mail')?>
                            </div>
                            
                            <div class="col-10">
                                <div class="seldos-formElement">
                                    <div class="checkbox">
                                        <input type="checkbox" id="seldosmail_smtp_user_control" name="seldosmail_smtp_user_control" value="1" <?=$seldosmail_smtp_user_control=='1'?'checked':''?>/>
                                        <label for="seldosmail_smtp_user_control"><?=__('SMTP Authentication','seldos-mail')?></label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-5">
                                <div class="seldos-formElement labelUp">
                                    <label for=""><?=__('Username','seldos-mail')?></label>
                                    <input type="text" name="seldosmail_smtp_user" placeholder="<?=__('e.g. seldos','seldos-mail')?>" value="<?=$seldosmail_smtp_user?>"/>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="seldos-formElement labelUp">
                                    <label for=""><?=__('Password','seldos-mail')?></label>
                                    <input type="text" name="seldosmail_smtp_pass" placeholder="<?=__('e.g. passwords','seldos-mail')?>" value="<?=$seldosmail_smtp_pass?>"/>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="col-10">
                            <div class="tabContentHead">
                                <?=__('From Settings','seldos-mail')?>
                            </div>
                            
                            <div class="col-5">
                                <div class="seldos-formElement labelUp">
                                    <label for=""><?=__('Sender Name','seldos-mail')?></label>
                                    <input type="text" name="seldosmail_smtp_sender_name" placeholder="<?=__('e.g. Seldos Company','seldos-mail')?>" value="<?=$seldosmail_smtp_sender_name?>"/>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="seldos-formElement labelUp">
                                    <label for=""><?=__('Sender Mail Address','seldos-mail')?></label>
                                    <input type="text" name="seldosmail_smtp_sender_mail" placeholder="<?=__('e.g. hello@seldos.com.tr','seldos-mail')?>" value="<?=$seldosmail_smtp_sender_mail?>"/>
                                </div>
                            </div>
                        
                        </div>
                        
                        
                        <hr />
                        <div class="buttons">
                            <button><?=__('Save','seldos-mail')?></button>
                        </div>
                        
                    </div>
                    
                    <div class="tabContent">
                        <div class="col-10">
                            <div class="seldos-formElement labelUp">
                                <label for=""><?=__('Mail','seldos-mail')?></label>
                                <input type="text" name="seldosmail_smtp_user" class="seldosmail_smtp_user" placeholder="<?=__('e.g. hello@seldos.com.tr','seldos-mail')?>"/>
                            </div>                  
                        </div>
                        <div class="col-10">
                            <div class="notice notice-success">
                                <p><?php _e( 'Success', 'seldos-mail' ); ?></p>
                            </div>
                            <div class="notice notice-error">
                                <p><?php _e( 'Error', 'seldos-mail' ); ?></p>
                            </div>
                            <code class="seldos-code">
                                adasdasd
                            </code>
                        </div>
                        <hr />
                        <div class="buttons">
                            <button class="test-send-btn"><?=__('Send','seldos-mail')?></button>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </form>
    </div>
</div>