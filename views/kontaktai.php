    <?php require_once('includes/header.php'); ?>
    <?php $mainEmail = Email::find(1); ?>
    <?php $web = Informacija::find(1); ?>
    <?php
        if(isset($_POST['siusti'])) {
            $vardas = $_POST['vardas'];
            $telefonas = $_POST['telefonas'];
            $email = $_POST['email'];
            $komentaras = $_POST['komentaras'];
            
            $subject = "Gavote naują užklausą per svetainę, nuo: ".$vardas." ";
            $fullMessage = "
                Nauja užklausa:<br>
                <hr>
                Vardas: <b>".$vardas."</b><br>
                Telefonas: <b>".$telefonas."</b><br>
                El.paštas: <b>".$email."</b><br>
                Komentaras: <b>".$komentaras."</b><br>
                ";
            $headers .= "From: MUZA <info@muza.fr>\r\n";
            $headers .= "Reply-To: ". $email . "\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            
            if(mail($mainEmail->email, $subject, $fullMessage, $headers)) {
                $_SESSION['issiusta_message'] = 1;
            } else {
                echo 'error';
            }
            
        }
    ?>
    <?php $kontaktai = Kontaktai::find(1); ?>
    <?php if(!empty($_SESSION['issiusta_message']) == 1) { ?>
        <script type="text/javascript">
                setTimeout(
                  function() 
                  {
                    $('.message-send').fadeOut('slow');
                    <?php $_SESSION['issiusta_message'] = ''; ?>  
                  }, 5555555000);
        </script>
        <div class="message-send">
            <div class="message-sended">
                <i class="fa fa-times" aria-hidden="true"></i>
                <?php if($_SESSION['lang'] == 'lt' ) { echo "<h3>".$mainEmail->zinuteLt."</h3>"; } ?>
                <?php if($_SESSION['lang'] == 'en' ) { echo "<h3>".$mainEmail->zinuteEn."</h3>"; } ?>
                <?php if($_SESSION['lang'] == 'fr' ) { echo "<h3>".$mainEmail->zinuteFr."</h3>"; } ?>
            </div>
        </div>
        <?php $_SESSION['issiusta_message'] = ''; ?>
    <?php } ?>
    <section id="kontaktai">
        <div class="container padding_on_mobile_contacts">
            <div class="row">
                <div class="col-sm-12">
                    <?php if($_SESSION['lang'] == 'lt' ) { echo "<h2>Dėl koncertų organizavimo teirautis:</h2>"; } ?>
                    <?php if($_SESSION['lang'] == 'en' ) { echo "<h2>For the organization to inquire:</h2>"; } ?>
                    <?php if($_SESSION['lang'] == 'fr' ) { echo "<h2>Pour l'organisation pour en savoir davantage:</h2>"; } ?>
                    <div class="col-sm-6">
                        <?php if($_SESSION['lang'] == 'lt' ) { echo "<h3>".$web->europa_lt."</h3>"; } ?>
                        <?php if($_SESSION['lang'] == 'en' ) { echo "<h3>".$web->europa_en."</h3>"; } ?>
                        <?php if($_SESSION['lang'] == 'fr' ) { echo "<h3>".$web->europa_fr."</h3>"; } ?>
                        <div class="contact">
                            <div class="contact_row">
                                <img src="assets/images/user.png" alt="">
                                <p><?php echo $kontaktai->asmuo_eu; ?></p>
                            </div>
                            <div class="contact_row">
                                <img src="assets/images/smartphone.png" alt="">
                                <p><?php echo $kontaktai->telefonas_eu; ?></p>
                            </div>
                            <div class="contact_row">
                                <img src="assets/images/mail.png" alt="">
                                <p><?php echo $kontaktai->email_eu; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mobile-top-contacts">
                        <?php if($_SESSION['lang'] == 'lt' ) { echo "<h3>".$web->jav_lt."</h3>"; } ?>
                        <?php if($_SESSION['lang'] == 'en' ) { echo "<h3>".$web->jav_en."</h3>"; } ?>
                        <?php if($_SESSION['lang'] == 'fr' ) { echo "<h3>".$web->jav_fr."</h3>"; } ?>
                        <div class="contact">
                            <div class="contact_row">
                                <img src="assets/images/user.png" alt="">
                                <p><?php echo $kontaktai->asmuo_jav; ?></p>
                            </div>
                            <div class="contact_row">
                                <img src="assets/images/smartphone.png" alt="">
                                <p><?php echo $kontaktai->telefonas_jav; ?></p>
                            </div>
                            <div class="contact_row">
                                <img src="assets/images/mail.png" alt="">
                                <p><?php echo $kontaktai->email_jav; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="kontaktu_forma">
        <div class="container padding_on_mobile_contacts">
            <div class="row">
                <div class="col-sm-12">
                    <?php if($_SESSION['lang'] == 'lt' ) { echo "<h2>".$web->klausimai_lt."</h2>"; } ?>
                    <?php if($_SESSION['lang'] == 'en' ) { echo "<h2>".$web->klausimai_en."</h2>"; } ?>
                    <?php if($_SESSION['lang'] == 'fr' ) { echo "<h2>".$web->klausimai_fr."</h2>"; } ?>
                </div>
                <form id="konForm" class="forma" action="" method="post">
                    <div class="col-sm-6">
                        <?php if($_SESSION['lang'] == 'lt' ) { echo "<label for=''>Vardas, pavardė:</label>"; } ?>
                        <?php if($_SESSION['lang'] == 'en' ) { echo "<label for=''>Name, surname:</label>"; } ?>
                        <?php if($_SESSION['lang'] == 'fr' ) { echo "<label for=''>Nom:</label>"; } ?>
                        <input type="text" name="vardas">
                        
                        <?php if($_SESSION['lang'] == 'lt' ) { echo "<label for=''>Telefonas:</label>"; } ?>
                        <?php if($_SESSION['lang'] == 'en' ) { echo "<label for=''>Phone:</label>"; } ?>
                        <?php if($_SESSION['lang'] == 'fr' ) { echo "<label for=''>Téléphone:</label>"; } ?>
                        <input type="text" name="telefonas">
                        
                        <?php if($_SESSION['lang'] == 'lt' ) { echo "<label for=''>El.paštas:</label>"; } ?>
                        <?php if($_SESSION['lang'] == 'en' ) { echo "<label for=''>Email:</label>"; } ?>
                        <?php if($_SESSION['lang'] == 'fr' ) { echo "<label for=''>E-mail:</label>"; } ?>
                        <input type="text" name="email">
                    </div>
                    <div class="col-sm-6">
                        <?php if($_SESSION['lang'] == 'lt' ) { echo "<label for=''>Komentaras:</label>"; } ?>
                        <?php if($_SESSION['lang'] == 'en' ) { echo "<label for=''>Comment:</label>"; } ?>
                        <?php if($_SESSION['lang'] == 'fr' ) { echo "<label for=''>Commentaire:</label>"; } ?>
                        <textarea name="komentaras" id="" cols="10" rows="6"></textarea>
                        <?php if($_SESSION['lang'] == 'lt' ) { 
                            echo '<img src="assets/images/send-symbol.png" alt=""><input type="submit" name="siusti" value="Siųsti">';
                        } ?>
                        <?php if($_SESSION['lang'] == 'en' ) {  
                            echo '<img src="assets/images/send-symbol.png" alt=""><input type="submit" name="siusti" value="Send">';
                        } ?>
                        <?php if($_SESSION['lang'] == 'fr' ) {  
                            echo '<img src="assets/images/send-symbol.png" alt=""><input type="submit" name="siusti" value="Envoyer">';
                        } ?>
                    </div>
                </form>
            </div>
        </div>
    </section>
   
    <?php require_once('includes/main_footer.php'); ?>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('#konForm').submit(function(event) {
                var vardas      = $('input[name=vardas]').val();
                var telefonas   = $('input[name=telefonas]').val();
                var email       = $('input[name=email]').val();
                var komentaras  = $('textarea[name=komentaras]').val();
                var error = 0;
                
                if(vardas == '') {
                    error++;
                    $('input[name=vardas]').addClass('klaidaFormoje');
                } else {
                   $('input[name=vardas]').removeClass('klaidaFormoje'); 
                }
                
                if(telefonas == '') {
                    error++;
                    $('input[name=telefonas]').addClass('klaidaFormoje');
                } else {
                    $('input[name=telefonas]').removeClass('klaidaFormoje');
                }
                
                if(email == '') {
                    error++;
                    $('input[name=email]').addClass('klaidaFormoje');
                } else {
                    $('input[name=email]').removeClass('klaidaFormoje');
                }
                
                if(komentaras == '') {
                    error++;
                    $('textarea[name=komentaras]').addClass('klaidaFormoje');
                } else {
                    $('textarea[name=komentaras]').removeClass('klaidaFormoje');
                }
                
                if(error == 0) {
                    
                } else {
                    event.preventDefault();
                }
            });
        });
    </script>