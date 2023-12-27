<?php


function request_quote_shortcode() {

    $output = '';

    $output .= '
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap"
    />
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap"
    />
    <style>
        .step_form_wrapper * {
            margin: 0;
            padding: 0;
        }
        .heading_1 {
            color: #000;
            font-family: Poppins;
            font-size: 30.25px;
            font-style: normal;
            font-weight: 700;
            line-height: 51.2px;
        }
        .step_form_wrapper {
            width: 580px;
            margin: 0 auto;
        }
        .heading_2 {
            color: #F05A28;
            font-family: Inter;
            font-size: 19.337px;
            font-style: normal;
            font-weight: 600;
            line-height: 33.28px;
            margin: 6px 0 12px 0;
        }
        .progress_wrapper {
            display: flex;
            gap: 3px;
        }
        .progress_line {
            width: 44.73px;
            height: 2px;
            border-radius: 16px;
            background: #CCC;
        }
        .progress_line.active {
            background: #F05A28;
        }
        .car_image {
            width: 100px;
            height: 84px;
            border-radius: 10px;
            border: 1px solid #F05A28;
            background: #FFF;
            overflow: hidden;
        }
        .car_image img {
            width: 100%;
        }
        .heading_3 {
            color: rgba(0, 0, 0, 0.87);
            font-family: Poppins;
            font-size: 18px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            margin-left: -60px;
        }
        .counter_wrapper {
            display: inline-flex;
            padding: 8px;
            justify-content: center;
            align-items: center;
            border-radius: 170px;
            border: 1px solid var(--Gray-Scale-Gray-100, #E6E6E6);
            background: var(--Gray-Scale-White, #FFF);
        }
        .counter_wrapper .plus_,
        .counter_wrapper .minus_ {
            width: 34px;
            height: 34px;
            border-radius: 170px;
            background: var(--Gray-Scale-Gray-50, #F2F2F2);
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }
        .counter_wrapper .number_ {
            width: 40px;
            color: var(--Gray-Scale-Gray-900, #1A1A1A);
            text-align: center;
            font-family: Poppins;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 150%;
            border: none;
        }
        .car_wrapper_item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 25px 0;
            border-top: 1px solid #DCDCE6;
        }
        .car_wrapper_item:first-child {
            border-color: transparent;
        }
        .date_input_item input {
            width: 92%;
            height: 50px;
            border-radius: 100px;
            border: 1px solid #b5b5b5;
            background: #FFF;
            padding: 0 10px;
        }
        .date_input_wrapper {
            display: flex;
            gap: 50px;
            margin-top: 30px;
        }
        .date_input_item {
            flex: 1;
        }
        .note_ label,
        .date_input_item label {
            color: #000;
            font-family: Inter;
            font-size: 12.375px;
            font-style: normal;
            font-weight: 400;
            line-height: 23.04px;
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 10px;
        }
        .note_ textarea {
            height: 100px;
            border: 1px solid #CCC;
            background: #FFF;
            width: 100%;
            padding: 10px;
        }
        .note_ {
            margin-top: 30px;
        }
        .step_btn {
            display: inline-flex;
            padding: 10px 24px;
            justify-content: center;
            align-items: center;
            gap: 10px;
            border-radius: 100px;
            background: #F05A28;
            color: #FFF !important;
            text-align: center;
            font-family: Poppins;
            font-size: 18px;
            font-style: normal;
            font-weight: 600;
            line-height: 28.16px;
            text-decoration: none;
            margin-top: 25px;
            border: none;
            cursor: pointer;
        }
        .note_ input{
            height: 48px;
            border: 1px solid #CCC;
            background: #FFF;
            width: 100%;
            padding: 0 10px;
        }
        .heading_4 {
            color: #000;
            font-family: Poppins;
            font-size: 18px;
            font-style: normal;
            font-weight: 700;
            line-height: 51.2px;
            margin-top: 30px;
        }
        .note_2col {
            display: flex;
            justify-content: space-between;
            gap: 40px;
        }
        .note_2col .note_ {
            flex: 1;
        }
        .step_2,
        .step_3 {
            display: none;
        }
        .step_back_btn {
            background: #a5a5a5;
        }
        .error {
            border-color: red !important;
        }
        @media (max-width: 767px) {
            .step_form_wrapper {
                width: 100%;
                padding: 0 20px;
            }
            .date_input_wrapper {
                flex-direction: column;
            }
            .date_input_item input {
                width: 100%;
            }
            .note_2col {
                flex-direction: column;
                gap: 0px;
            }
            .car_wrapper_item {
                align-items: start;
                justify-content: start;
                flex-direction: column;
                gap: 15px;
            }
            .heading_3 {
                margin-left: 0;
            }
            .car_image {
                order: 2;
            }
            .heading_3 {
                order: 1;
            }
            .counter_wrapper {
                order: 3;
            }
        }
    </style>

    <form action="" method="post">
        <div class="step_form_wrapper">

            <h1 class="heading_1">Offerte aanvragen</h1>

            <div class="step_1">

                <h3 class="heading_2">Step 1</h3>

                <div class="progress_wrapper">
                    <div class="progress_line active"></div>
                    <div class="progress_line"></div>
                    <div class="progress_line"></div>
                </div>

                <div class="car_wrapper_list">';
                    
                    $product_ids = isset($_GET['product_id']) ? $_GET['product_id'] : '';

                    $product_ids_array = array_map('intval', (array) $product_ids);

                    $args = array(
                        'post_type'      => 'product',
                        'posts_per_page' => -1,
                        'post__in'       => $product_ids_array, 
                    );
                    
                    $products_query = new WP_Query( $args );
                    
                    if ( $products_query->have_posts() ) {
                        while ( $products_query->have_posts() ) {
                            $products_query->the_post();
                            
                            $output .= '
                            <div class="car_wrapper_item">
                                <div class="car_image">
                                    <input type="hidden" value="'.get_the_post_thumbnail_url().'" name="car_image[]"/>
                                    <img src="'.get_the_post_thumbnail_url().'" alt="car">
                                </div>
                                <input type="hidden" value="'.get_the_title().'" name="car_heading[]"/>
                                <h3 class="heading_3">'.get_the_title().'</h3>
                                <div class="counter_wrapper">
                                    <div class="minus_">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                            <path d="M2.3335 7H11.6668" stroke="#666666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <input type="text" value="1" class="number_" name="total_car[]"> 
                                    <div class="plus_">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                            <path d="M2.3335 6.99992H11.6668M7.00016 2.33325V11.6666V2.33325Z" stroke="#1A1A1A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            ';
                            
                        }

                        wp_reset_postdata();
                    }                   
                                   

                    $output .= '

                </div>

                <div class="date_input_wrapper">
                    <div class="date_input_item">
                        <label for="start_date">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="17" viewBox="0 0 15 17" fill="none">
                                <g clip-path="url(#clip0_1_1495)">
                                <path d="M4.49505 10.12C4.38937 10.1226 4.28429 10.1035 4.18627 10.0639C4.08825 10.0244 3.99935 9.9652 3.92505 9.89002C3.84967 9.81586 3.79036 9.72699 3.75079 9.62893C3.71122 9.53087 3.69225 9.42572 3.69505 9.32002C3.69505 9.09302 3.77205 8.90302 3.92505 8.75002C3.99917 8.6746 4.08803 8.61525 4.1861 8.57568C4.28417 8.53611 4.38934 8.51716 4.49505 8.52002C4.72205 8.52002 4.91205 8.59702 5.06505 8.75002C5.21905 8.90402 5.29505 9.09402 5.29505 9.32002C5.29761 9.42569 5.27852 9.53077 5.23897 9.6288C5.19942 9.72682 5.14023 9.81572 5.06505 9.89002C4.99092 9.96544 4.90206 10.0248 4.80399 10.0644C4.70592 10.1039 4.60076 10.1229 4.49505 10.12ZM7.69505 10.12C7.58937 10.1226 7.48429 10.1035 7.38627 10.0639C7.28825 10.0244 7.19935 9.9652 7.12505 9.89002C7.04967 9.81586 6.99036 9.72699 6.95079 9.62893C6.91122 9.53087 6.89225 9.42572 6.89505 9.32002C6.89505 9.09302 6.97205 8.90302 7.12505 8.75002C7.19917 8.6746 7.28804 8.61525 7.3861 8.57568C7.48417 8.53611 7.58934 8.51716 7.69505 8.52002C7.92105 8.52002 8.11105 8.59702 8.26505 8.75002C8.41905 8.90402 8.49505 9.09402 8.49505 9.32002C8.49761 9.42569 8.47852 9.53077 8.43897 9.6288C8.39942 9.72682 8.34023 9.81572 8.26505 9.89002C8.19092 9.96544 8.10206 10.0248 8.00399 10.0644C7.90592 10.1039 7.80076 10.1229 7.69505 10.12ZM10.895 10.12C10.7892 10.1227 10.6839 10.1037 10.5857 10.0641C10.4875 10.0246 10.3985 9.96533 10.324 9.89002C10.2487 9.81586 10.1894 9.72699 10.1498 9.62893C10.1102 9.53087 10.0912 9.42572 10.094 9.32002C10.094 9.09302 10.171 8.90302 10.324 8.75002C10.3982 8.6746 10.487 8.61525 10.5851 8.57568C10.6832 8.53611 10.7883 8.51716 10.894 8.52002C11.121 8.52002 11.311 8.59702 11.464 8.75002C11.618 8.90402 11.694 9.09402 11.694 9.32002C11.6966 9.42569 11.6775 9.53077 11.638 9.6288C11.5984 9.72682 11.5392 9.81572 11.464 9.89002C11.3899 9.96544 11.3011 10.0248 11.203 10.0644C11.1049 10.1039 10.9998 10.1229 10.894 10.12H10.895ZM2.09505 16.52C1.65505 16.52 1.27905 16.363 0.965047 16.05C0.813541 15.9039 0.693654 15.7282 0.612809 15.5338C0.531964 15.3394 0.491883 15.1305 0.495047 14.92V3.72002C0.495047 3.28002 0.652047 2.90302 0.965047 2.59002C1.28005 2.27602 1.65605 2.12002 2.09505 2.12002H2.89505V0.52002H4.49505V2.12002H10.895V0.52002H12.495V2.12002H13.294C13.734 2.12002 14.111 2.27702 14.424 2.59002C14.738 2.90402 14.894 3.28002 14.894 3.72002V14.92C14.894 15.36 14.737 15.737 14.424 16.05C14.2778 16.2014 14.1021 16.3213 13.9077 16.4021C13.7134 16.4829 13.5045 16.5231 13.294 16.52H2.09505ZM2.09505 14.92H13.294V6.92002H2.09505V14.92Z" fill="#3A3A3A"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_1_1495">
                                    <rect width="15" height="16" fill="white" transform="translate(0 0.52002)"/>
                                </clipPath>
                                </defs>
                            </svg>
                            Ophaaldatum
                        </label>
                        <input type="date" name="start_date" id="start_date">
                    </div>
                    <div class="date_input_item">
                        <label for="end_date">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="17" viewBox="0 0 15 17" fill="none">
                                <g clip-path="url(#clip0_1_1495)">
                                <path d="M4.49505 10.12C4.38937 10.1226 4.28429 10.1035 4.18627 10.0639C4.08825 10.0244 3.99935 9.9652 3.92505 9.89002C3.84967 9.81586 3.79036 9.72699 3.75079 9.62893C3.71122 9.53087 3.69225 9.42572 3.69505 9.32002C3.69505 9.09302 3.77205 8.90302 3.92505 8.75002C3.99917 8.6746 4.08803 8.61525 4.1861 8.57568C4.28417 8.53611 4.38934 8.51716 4.49505 8.52002C4.72205 8.52002 4.91205 8.59702 5.06505 8.75002C5.21905 8.90402 5.29505 9.09402 5.29505 9.32002C5.29761 9.42569 5.27852 9.53077 5.23897 9.6288C5.19942 9.72682 5.14023 9.81572 5.06505 9.89002C4.99092 9.96544 4.90206 10.0248 4.80399 10.0644C4.70592 10.1039 4.60076 10.1229 4.49505 10.12ZM7.69505 10.12C7.58937 10.1226 7.48429 10.1035 7.38627 10.0639C7.28825 10.0244 7.19935 9.9652 7.12505 9.89002C7.04967 9.81586 6.99036 9.72699 6.95079 9.62893C6.91122 9.53087 6.89225 9.42572 6.89505 9.32002C6.89505 9.09302 6.97205 8.90302 7.12505 8.75002C7.19917 8.6746 7.28804 8.61525 7.3861 8.57568C7.48417 8.53611 7.58934 8.51716 7.69505 8.52002C7.92105 8.52002 8.11105 8.59702 8.26505 8.75002C8.41905 8.90402 8.49505 9.09402 8.49505 9.32002C8.49761 9.42569 8.47852 9.53077 8.43897 9.6288C8.39942 9.72682 8.34023 9.81572 8.26505 9.89002C8.19092 9.96544 8.10206 10.0248 8.00399 10.0644C7.90592 10.1039 7.80076 10.1229 7.69505 10.12ZM10.895 10.12C10.7892 10.1227 10.6839 10.1037 10.5857 10.0641C10.4875 10.0246 10.3985 9.96533 10.324 9.89002C10.2487 9.81586 10.1894 9.72699 10.1498 9.62893C10.1102 9.53087 10.0912 9.42572 10.094 9.32002C10.094 9.09302 10.171 8.90302 10.324 8.75002C10.3982 8.6746 10.487 8.61525 10.5851 8.57568C10.6832 8.53611 10.7883 8.51716 10.894 8.52002C11.121 8.52002 11.311 8.59702 11.464 8.75002C11.618 8.90402 11.694 9.09402 11.694 9.32002C11.6966 9.42569 11.6775 9.53077 11.638 9.6288C11.5984 9.72682 11.5392 9.81572 11.464 9.89002C11.3899 9.96544 11.3011 10.0248 11.203 10.0644C11.1049 10.1039 10.9998 10.1229 10.894 10.12H10.895ZM2.09505 16.52C1.65505 16.52 1.27905 16.363 0.965047 16.05C0.813541 15.9039 0.693654 15.7282 0.612809 15.5338C0.531964 15.3394 0.491883 15.1305 0.495047 14.92V3.72002C0.495047 3.28002 0.652047 2.90302 0.965047 2.59002C1.28005 2.27602 1.65605 2.12002 2.09505 2.12002H2.89505V0.52002H4.49505V2.12002H10.895V0.52002H12.495V2.12002H13.294C13.734 2.12002 14.111 2.27702 14.424 2.59002C14.738 2.90402 14.894 3.28002 14.894 3.72002V14.92C14.894 15.36 14.737 15.737 14.424 16.05C14.2778 16.2014 14.1021 16.3213 13.9077 16.4021C13.7134 16.4829 13.5045 16.5231 13.294 16.52H2.09505ZM2.09505 14.92H13.294V6.92002H2.09505V14.92Z" fill="#3A3A3A"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_1_1495">
                                    <rect width="15" height="16" fill="white" transform="translate(0 0.52002)"/>
                                </clipPath>
                                </defs>
                            </svg>
                            Retourdatum
                        </label>
                        <input type="date" name="end_date" id="end_date">
                    </div>
                </div>

                <div class="note_">
                    <label for="note">
                        Opmerking(en)
                    </label>
                    <textarea name="quote_note" id="note"></textarea>
                </div>

                <a href="#!" class="step_btn go_step_2">
                    Volgende stap
                </a>

            </div>

            <div class="step_2">

                <h3 class="heading_2">Step 2</h3>

                <div class="progress_wrapper">
                    <div class="progress_line active"></div>
                    <div class="progress_line active"></div>
                    <div class="progress_line"></div>
                </div>

                <div class="note_">
                    <label for="company_name">
                        Bedrijfsnaam
                    </label>
                    <input type="text" name="company_name" id="company_name">
                </div>

                <a href="#!" class="step_btn step_back_btn back_step_1">
                    Vorige
                </a>
                <a href="#!" class="step_btn go_step_3">
                    Volgende stap
                </a>
                
            </div>

            <div class="step_3">

                <h3 class="heading_2">Step 3</h3>

                <div class="progress_wrapper">
                    <div class="progress_line active"></div>
                    <div class="progress_line active"></div>
                    <div class="progress_line active"></div>
                </div>

                <h2 class="heading_4">Gegevens bedrijf</h2>
                
                <div>
                    <div class="note_">
                        <label for="company_name_2">
                            Bedrijfsnaam
                        </label>
                        <input type="text" name="company_name_2" id="company_name_2" placeholder="Bedrijfsnaam" required>
                    </div>

                    <div class="note_2col">
                        <div class="note_">
                            <label for="kvk_num">
                                KVK nummer
                            </label>
                            <input type="text" name="kvk_num" id="kvk_num" placeholder="KVK nummer" required>
                        </div>
                        <div class="note_">
                            <label for="btw_num">
                                BTW nummer
                            </label>
                            <input type="text" name="btw_num" id="btw_num" placeholder="BTW nummer" required>
                        </div>
                    </div>

                    <div class="note_2col">
                        <div class="note_">
                            <label for="post_code">
                                Postcode
                            </label>
                            <input type="text" name="post_code" id="post_code" placeholder="Postcode" required>
                        </div>
                        <div class="note_">
                            <label for="house_no">
                                Huisnummer en toevoeging
                            </label>
                            <input type="text" name="house_no" id="house_no" placeholder="Huisnummer en toevoeging" required>
                        </div>
                    </div>

                    <div class="note_2col">
                        <div class="note_">
                            <label for="street_name">
                                Straatnaam
                            </label>
                            <input type="text" name="street_name" id="street_name" placeholder="Straatnaam" required>
                        </div>
                        <div class="note_">
                            <label for="quote_place">
                                Plaats
                            </label>
                            <input type="text" name="quote_place" id="quote_place" placeholder="Plaats" required>
                        </div>
                    </div>

                </div>

                <h2 class="heading_4">Gegevens contactpersoon</h2>

                <div>
                    <div class="note_2col">
                        <div class="note_">
                            <label for="first_name">
                                Voornaam
                            </label>
                            <input type="text" name="first_name" id="first_name" placeholder="Voornaam" required>
                        </div>
                        <div class="note_">
                            <label for="quote_infix">
                                Tussenvoegsel
                            </label>
                            <input type="text" name="quote_infix" id="quote_infix" placeholder="Tussenvoegsel" required>
                        </div>
                        <div class="note_">
                            <label for="last_name">
                                Achternaam
                            </label>
                            <input type="text" name="last_name" id="last_name" placeholder="Achternaam" required>
                        </div>
                    </div>

                    <div class="note_2col">
                        <div class="note_">
                            <label for="email_address">
                                E-mailadres
                            </label>
                            <input type="email" name="email_address" id="email_address" placeholder="E-mailadres" required>
                        </div>
                        <div class="note_">
                            <label for="phone_number">
                                Telefoonnummer
                            </label>
                            <input type="tel" name="phone_number" id="phone_number" placeholder="Telefoonnummer" required>
                        </div>
                    </div>

                </div>

                <a href="#!" class="step_btn step_back_btn back_step_2">
                    Vorige
                </a>
                <button type="submit" name="quote_submit" class="step_btn">
                    Offerte aanvragen
                </button>
                
            </div>

        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        jQuery(document).ready(function($){

            // step go back 
            $(".go_step_2").on("click", function(e){

                e.preventDefault();
                var inputs = $(this).closest(".step_1").find("input[type=\'date\']");
                var isValid = true;

                inputs.each(function() {
                    if ($(this).val().trim() === \'\') {
                        $(this).addClass("error");
                        isValid = false;
                    }
                });

                if (!isValid) {
                    
                } else {
                    $(".step_1").hide();
                    $(".step_2").show();
                }

            });
        
            $(".go_step_3").on("click", function(e){

                e.preventDefault();
                var inputs = $(this).closest(".step_2").find("input");
                var isValid = true;

                inputs.each(function() {
                    if ($(this).val().trim() === \'\') {
                        $(this).addClass("error");
                        isValid = false;
                    }
                });

                if (!isValid) {
                    
                } else {
                    $(".step_1").hide();
                    $(".step_2").hide();
                    $(".step_3").show();
                }
                
            });
        
            $(".back_step_1").on("click", function(){
                $(".step_1").show();
                $(".step_2").hide();
                $(".step_3").hide();
            });
        
            $(".back_step_2").on("click", function(){
                $(".step_1").hide();
                $(".step_2").show();
                $(".step_3").hide();
            });
        
        
            // plus minus button 
            $(".plus_").click(function(){
                var $counterWrapper = $(this).closest(".counter_wrapper");
                var value = parseInt($counterWrapper.find(".number_").val());
                $counterWrapper.find(".number_").val(value + 1);
            });
        
            $(".minus_").click(function(){
                var $counterWrapper = $(this).closest(".counter_wrapper");
                var value = parseInt($counterWrapper.find(".number_").val());
                if(value > 1) {
                    $counterWrapper.find(".number_").val(value - 1);
                }
            });

            //on change to remove error 
            $(".step_form_wrapper input").on("change", function(){
                $(this).removeClass("error");
            });
        
        });
    </script>
    ';

    return $output;
}
add_shortcode( 'request_quote', 'request_quote_shortcode' );