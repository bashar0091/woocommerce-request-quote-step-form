<?php

add_action('init', 'custom_email_function');

// Define your custom function
function custom_email_function() {

    if( isset($_POST['quote_submit']) ) {

        $car_images = isset($_POST['car_image']) ? array_map('esc_url_raw', $_POST['car_image']) : array();
        $car_headings = isset($_POST['car_heading']) ? array_map('sanitize_text_field', $_POST['car_heading']) : array();
        $total_cars = isset($_POST['total_car']) ? array_map('intval', $_POST['total_car']) : array();

        // Combine the data into an array
        $combined_data = array();
        for ($i = 0; $i < count($car_images); $i++) {
            $combined_data[] = array(
                'car_image' => $car_images[$i],
                'car_heading' => $car_headings[$i],
                'total_car' => $total_cars[$i]
            );
        }

        $to = 'atikqul4u@gmail.com,awalbashar194@gmail.com'; // Replace with your Gmail address
        $subject = 'Request a Quote';
    
        // Create a large email body
        $message = '
        <div>
            <h1 style="color: #000; font-family: Poppins; font-size: 30.25px; font-style: normal; font-weight: 700; line-height: 51.2px;">Offerte aanvragen</h1>
        
            <div style="border: 1px solid #ddd; padding: 10px; margin: 10px;">
                <h3 style="color: #f05a28; font-family: Inter; font-size: 19.337px; font-style: normal; font-weight: 600; line-height: 33.28px; margin: 6px 0 12px 0;">Step 1</h3>
        
                <table style="width: 50%;">
                    <tbody>';
                        foreach ($combined_data as $car_data) {
                            $message .= '
                            <tr>
                                <td>
                                    <div style="width: 100px; height: 84px; border-radius: 10px; border: 1px solid #f05a28; background: #fff; overflow: hidden;">
                                        <img
                                            src="'.esc_url($car_data['car_image']).'"
                                            alt="car"
                                            style="width: 100%;"
                                            class="CToWUd"
                                            data-bit="iit"
                                        />
                                    </div>
                                </td>
            
                                <td>
                                    <h3 style="color: rgba(0, 0, 0, 0.87); font-family: Poppins; font-size: 18px; font-style: normal; font-weight: 600; line-height: normal;">'.esc_html($car_data['car_heading']).'</h3>
                                </td>
            
                                <td>
                                    <div style="display: inline-flex; padding: 8px; border-radius: 170px; border: 1px solid #858585; background: var(--Gray-Scale-White, #fff);">
                                        '.intval($car_data['total_car']).'
                                    </div>
                                </td>
                            </tr>
                            ';
                        }
                    
                    $message .= '
                    </tbody>
                </table>
        
                <div style="display: flex; margin-top: 30px;">
                    <div style="width: 100%; margin-right: 10px;">
                        <label style="color: #000; font-family: Inter; font-size: 12.375px; font-style: normal; font-weight: 400; line-height: 23.04px; display: flex; margin-bottom: 10px;">
                            Ophaaldatum
                        </label>
                        <span style="border: 1px solid #b9b9b9; padding: 10px; display: block;">'.$_POST['start_date'].'</span>
                    </div>
                    <div style="width: 100%; margin-left: 10px;">
                        <label
                            for="m_-8492754684808779402m_7959433327860956600m_5464243697725560325end_date"
                            style="color: #000; font-family: Inter; font-size: 12.375px; font-style: normal; font-weight: 400; line-height: 23.04px; display: flex; margin-bottom: 10px;"
                        >
                            Retourdatum
                        </label>
                        <span style="border: 1px solid #b9b9b9; padding: 10px; display: block;">'.$_POST['end_date'].'</span>
                    </div>
                </div>
        
                <div style="margin-top: 20px;">
                    <label for="m_-8492754684808779402m_7959433327860956600m_5464243697725560325note">
                        Opmerking(en)
                    </label>
                    <span style="border: 1px solid #b9b9b9; padding: 10px; display: block;">'.$_POST['quote_note'].'</span>
                </div>
            </div>
        
            <div style="border: 1px solid #ddd; padding: 10px; margin: 10px;">
                <h3 style="color: #f05a28; font-family: Inter; font-size: 19.337px; font-style: normal; font-weight: 600; line-height: 33.28px; margin: 6px 0 12px 0;">Step 2</h3>
        
                <div>
                    <label for="m_-8492754684808779402m_7959433327860956600m_5464243697725560325company_name">
                        Bedrijfsnaam
                    </label>
                    <span style="border: 1px solid #b9b9b9; padding: 10px; display: block;">'.$_POST['company_name'].'</span>
                </div>
            </div>
        
            <div style="border: 1px solid #ddd; padding: 10px; margin: 10px;">
                <h3 style="color: #f05a28; font-family: Inter; font-size: 19.337px; font-style: normal; font-weight: 600; line-height: 33.28px; margin: 6px 0 12px 0;">Step 3</h3>
        
                <h2>Gegevens bedrijf</h2>
        
                <div>
                    <div>
                        <label for="m_-8492754684808779402m_7959433327860956600m_5464243697725560325company_name_2">
                            Bedrijfsnaam
                        </label>
                        <span style="border: 1px solid #b9b9b9; padding: 10px; display: block;">'.$_POST['company_name_2'].'</span>
                    </div>
        
                    <div style="display: flex; margin: 15px 0;">
                        <div style="width: 100%; margin-right: 10px;">
                            <label for="m_-8492754684808779402m_7959433327860956600m_5464243697725560325kvk_num">
                                KVK nummer
                            </label>
                            <span style="border: 1px solid #b9b9b9; padding: 10px; display: block;">'.$_POST['kvk_num'].'</span>
                        </div>
                        <div style="width: 100%; margin-left: 10px;">
                            <label for="m_-8492754684808779402m_7959433327860956600m_5464243697725560325btw_num">
                                BTW nummer
                            </label>
                            <span style="border: 1px solid #b9b9b9; padding: 10px; display: block;">'.$_POST['btw_num'].'</span>
                        </div>
                    </div>
        
                    <div style="display: flex; margin: 15px 0;">
                        <div style="width: 100%; margin-right: 10px;">
                            <label for="m_-8492754684808779402m_7959433327860956600m_5464243697725560325post_code">
                                Postcode
                            </label>
                            <span style="border: 1px solid #b9b9b9; padding: 10px; display: block;">'.$_POST['post_code'].'</span>
                        </div>
                        <div style="width: 100%; margin-left: 10px;">
                            <label for="m_-8492754684808779402m_7959433327860956600m_5464243697725560325house_no">
                                Huisnummer en toevoeging
                            </label>
                            <span style="border: 1px solid #b9b9b9; padding: 10px; display: block;">'.$_POST['house_no'].'</span>
                        </div>
                    </div>
        
                    <div style="display: flex; margin: 15px 0;">
                        <div style="width: 100%; margin-right: 10px;">
                            <label for="m_-8492754684808779402m_7959433327860956600m_5464243697725560325street_name">
                                Straatnaam
                            </label>
                            <span style="border: 1px solid #b9b9b9; padding: 10px; display: block;">'.$_POST['street_name'].'</span>
                        </div>
                        <div style="width: 100%; margin-left: 10px;">
                            <label for="m_-8492754684808779402m_7959433327860956600m_5464243697725560325quote_place">
                                Plaats
                            </label>
                            <span style="border: 1px solid #b9b9b9; padding: 10px; display: block;">'.$_POST['quote_place'].'</span>
                        </div>
                    </div>
                </div>
        
                <h2>Gegevens contactpersoon</h2>
        
                <div>
                    <div style="display: flex;">
                        <div style="width: 100%;">
                            <label for="m_-8492754684808779402m_7959433327860956600m_5464243697725560325first_name">
                                Voornaam
                            </label>
                            <span style="border: 1px solid #b9b9b9; padding: 10px; display: block;">'.$_POST['first_name'].'</span>
                        </div>
                        <div style="width: 100%; margin: 0 15px;">
                            <label for="m_-8492754684808779402m_7959433327860956600m_5464243697725560325quote_infix">
                                Tussenvoegsel
                            </label>
                            <span style="border: 1px solid #b9b9b9; padding: 10px; display: block;">'.$_POST['quote_infix'].'</span>
                        </div>
                        <div style="width: 100%;">
                            <label for="m_-8492754684808779402m_7959433327860956600m_5464243697725560325last_name">
                                Achternaam
                            </label>
                            <span style="border: 1px solid #b9b9b9; padding: 10px; display: block;">'.$_POST['last_name'].'</span>
                        </div>
                    </div>
        
                    <div style="display: flex; margin-top: 20px;">
                        <div style="width: 100%; margin-right: 10px;">
                            <label for="m_-8492754684808779402m_7959433327860956600m_5464243697725560325email_address">
                                E-mailadres
                            </label>
                            <span style="border: 1px solid #b9b9b9; padding: 10px; display: block;">'.$_POST['email_address'].'</span>
                        </div>
                        <div style="width: 100%; margin-left: 10px;">
                            <label for="m_-8492754684808779402m_7959433327860956600m_5464243697725560325phone_number">
                                Telefoonnummer
                            </label>
                            <span style="border: 1px solid #b9b9b9; padding: 10px; display: block;">'.$_POST['phone_number'].'</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';
    
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
    
        // Send email using wp_mail function
        $result = wp_mail($to, $subject, $message, $headers);
    
        if ($result) {
            wp_redirect( home_url('/thank-you') ); 
            exit;
        }
    
    }

}