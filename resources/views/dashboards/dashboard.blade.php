<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            @if ($appPermissao->view_dash == true)
                <div class="row row-cols-1">
                    <div class="d-slider1 overflow-hidden ">
                        <ul class="swiper-wrapper list-inline m-0 p-0 mb-2">
                            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
                                <div class="card-body">
                                    <div class="progress-widget">
                                        <div id="circle-progress-01"
                                            class="circle-progress-01 circle-progress circle-progress-primary text-center"
                                            data-min-value="0" data-max-value="100"
                                            data-value="{{ $porcentage_pessoa }}" data-type="percent">
                                            <svg class="card-slie-arrow" xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor" class="bi bi-person"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                            </svg>
                                        </div>
                                        <div class="progress-detail">
                                            <p class="mb-2">Pessoas</p>
                                            <h4 class="counter" style="visibility: visible;">{{ $peopleativo }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                                <div class="card-body">
                                    <div class="progress-widget">
                                        <div id="circle-progress-02"
                                            class="circle-progress-01 circle-progress circle-progress-info text-center"
                                            data-min-value="0" data-max-value="100"
                                            data-value="{{ $porcentage_visitante }}" data-type="percent">
                                            <svg class="card-slie-arrow " xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor"
                                                class="bi bi-person-plus" viewBox="0 0 16 16">
                                                <path
                                                    d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                                <path fill-rule="evenodd"
                                                    d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                            </svg>
                                        </div>
                                        <div class="progress-detail">
                                            <p class="mb-2">Visitantes</p>
                                            <h4 class="counter">{{ $peoplevisitor }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="9100">
                                <div class="card-body">
                                    <div class="progress-widget">
                                        <div id="circle-progress-03"
                                            class="circle-progress-01 circle-progress circle-progress-primary text-center"
                                            data-min-value="0" data-max-value="100"
                                            data-value="{{ number_format($porcentage_total, 2) }}"
                                            data-type="percent">
                                            <svg class="card-slie-arrow " xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor"
                                                class="bi bi-speedometer2" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z" />
                                                <path fill-rule="evenodd"
                                                    d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z" />
                                            </svg>
                                        </div>
                                        <div class="progress-detail">
                                            <p class="mb-2">Transações</p>
                                            <h4 class="counter">R${{ $totalfinanceiro }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1000">
                                <div class="card-body">
                                    <div class="progress-widget">
                                        <div id="circle-progress-04"
                                            class="circle-progress-01 circle-progress circle-progress-info text-center"
                                            data-min-value="0" data-max-value="100"
                                            data-value="{{ $porcentage_calendario }}" data-type="percent">
                                            <svg class="card-slie-arrow " xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor"
                                                class="bi bi-calendar-date" viewBox="0 0 16 16">
                                                <path
                                                    d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z" />
                                                <path
                                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                            </svg>
                                        </div>
                                        <div class="progress-detail">
                                            <p class="mb-2">Eventos</p>
                                            <h4 class="counter">{{ $eventos }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1100">
                                <div class="card-body">
                                    <div class="progress-widget">
                                        <div id="circle-progress-05"
                                            class="circle-progress-01 circle-progress circle-progress-primary text-center"
                                            data-min-value="0" data-max-value="100"
                                            data-value="{{ $porcentage_recado }}" data-type="percent">
                                            <svg class="card-slie-arrow " xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor" class="bi bi-chat"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z" />
                                            </svg>
                                        </div>
                                        <div class="progress-detail">
                                            <p class="mb-2">Recados</p>
                                            <h4 class="counter">{{ $notes }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1200">
                                <div class="card-body">
                                    <div class="progress-widget">
                                        <div id="circle-progress-06"
                                            class="circle-progress-01 circle-progress circle-progress-info text-center"
                                            data-min-value="0" data-max-value="100" data-value="40"
                                            data-type="percent">
                                            <svg class="card-slie-arrow " version="1.1" id="Layer_1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                y="0px" viewBox="0 0 64 64" enable-background="new 0 0 64 64"
                                                xml:space="preserve">
                                                <g id="Handshake">
                                                    <path
                                                        d="M43.5068855,15.4409504c-0.2255974-0.2323999-0.5498009-0.3369007-0.8731003-0.2920008L30.956089,16.9790497
                                c-0.1362,0.0214996-0.2616997,0.0696011-0.3719006,0.1380997l-9.164299-1.9574995
                                c-0.3348999-0.0752001-0.6865005,0.0341997-0.9267006,0.2813005L8.486289,27.8296509
                                c-0.8691001,0.8973999-1.1532998,2.1883984-0.7402,3.3701l1.7285004,4.9403973
                                c0.3076,0.8789024,0.8339996,1.6748009,1.5225,2.3018036l1.6754999,1.5261993
                                c-0.2772999,0.6707001-0.9285002,2.5587997-0.4352999,4.5830994c1.2909994,5.2979012,4.5928001,8.5370979,10.3906994,10.1944008
                                c1.1328011,0.3241997,2.3241997,0.4296989,3.3955002,0.4296989c1.3812008,0,2.5513992-0.1743011,3.1448002-0.2812996
                                c0.9283009,0.6287994,2.0076008,0.9745979,3.1188011,0.9745979c0.4766006,0,0.9570999-0.0604973,1.4316978-0.1844978
                                c6.508297-1.7245026,10.7879982-5.9498024,12.7438965-12.5466003c0.2342033-0.0388985,0.4595032-0.1385994,0.6203041-0.3381996
                                l5.122097-6.3828011c0.0811005-0.1016006,0.1581993-0.205101,0.2313995-0.3106003l3.089901-4.4531002
                                c0.892601-1.2852001,0.75-3.0341988-0.3389015-4.1602001L43.5068855,15.4409504z M23.1777897,52.8227501
                                c-5.1036015-1.4589996-7.8790007-4.1562004-8.9971008-8.7440987c-0.2414999-0.9911003-0.0801001-1.9682999,0.1051006-2.6408997
                                L27.1245899,53.133049C25.9748898,53.21595,24.5036888,53.2020493,23.1777897,52.8227501z M44.7216873,41.9770508
                                c-0.2604027,0.9735985-0.5762024,1.8815002-0.9360008,2.7387009l-10.2612991-9.1215019
                                c-0.4130974-0.3690987-1.044899-0.3320007-1.4110985,0.0830002c-0.3671989,0.4121017-0.3300991,1.044899,0.0830002,1.4110985
                                l10.4980965,9.3320999c0.0609016,0.0543022,0.1324005,0.0848999,0.2013016,0.1216011
                                c-0.5214996,0.9244995-1.1152992,1.7673988-1.783802,2.5289993l-11.0815964-9.9729004
                                c-0.4102001-0.3681984-1.0419998-0.3358994-1.4120998,0.0742035c-0.3691998,0.4101982-0.3360004,1.0429993,0.0741997,1.4120979
                                l10.9942989,9.8944016c-0.7516975,0.6420975-1.5737991,1.2094994-2.4709015,1.6994972
                                c-0.0522995-0.0907974-0.1086006-0.1806984-0.1913986-0.2539978l-10.4979992-9.3311005
                                c-0.4130993-0.3680992-1.0439987-0.3310013-1.4110985,0.0830002c-0.3672009,0.4120979-0.330101,1.0449982,0.0830002,1.4111977
                                l10.1039982,8.9808006c-0.6648979,0.2596016-1.3610992,0.4877014-2.0923004,0.6813011
                                c-1.1903992,0.3134995-2.4374981,0.0028992-3.3437977-0.8241997L12.3437891,36.9633484
                                c-0.4434004-0.4041977-0.7832003-0.9168968-0.9805002-1.4833984l-1.7294998-4.9403992
                                c-0.1620998-0.4619007-0.0508003-0.9678001,0.2890997-1.3183002l11.6211004-11.9903011l11.0478001,2.3593998
                                c0.6729012,0.1436005,1.2901001,0.4736004,1.7851982,0.9531002l3.4375,3.3320999
                                c0.6708984,0.650301,1.0057983,1.5556011,0.919899,2.4853001c-0.0849991,0.9277-0.580101,1.7567997-1.357399,2.2734013
                                l-0.8526001,0.5664997c-2.6542969-2.3799-4.7733974-4.2754002-4.7733974-4.2754002
                                c-0.4111004-0.3672009-1.0391006-0.335001-1.4082012,0.0741997c-0.3690987,0.4071999-0.3397999,1.0361004,0.0654011,1.4081993
                                l5.2763996,4.8389015c0.107399,0.097599,0.2313995,0.1688995,0.3633003,0.2127991
                                c2.6581955,2.3838005,5.6610985,5.0791016,7.5780983,6.8125C44.6689873,39.2046509,45.0888863,40.6235504,44.7216873,41.9770508z
                                 M53.8837852,30.5122509l-3.0907974,4.4540997c-0.0488014,0.0713005-0.1006012,0.1395988-0.1514015,0.2030983l-3.8837013,4.8386993
                                c-0.2176971-1.2216988-0.8288956-2.3593979-1.7939987-3.2234993c-1.7558975-1.5858994-4.4218979-3.9813995-6.9014015-6.204998
                                l0.4209023-0.2784004c1.2851982-0.8544998,2.1026039-2.2245998,2.2431984-3.7578011
                                c0.1416016-1.535099-0.4120979-3.0301991-1.5195007-4.1034985l-3.4384956-3.3330002
                                c-0.2825012-0.2737999-0.5979004-0.5041008-0.9267998-0.7117004l7.5898972-1.1897011L53.750988,28.8842506
                                C54.1767845,29.3247509,54.2323875,30.0092506,53.8837852,30.5122509z" />
                                                    <path
                                                        d="M19.5068893,13.2387505l-4.8077002-4.8144007c-0.1875-0.1875-0.4422998-0.2930002-0.7069998-0.2930002
                                c-0.0010004,0-0.0010004,0-0.0010004,0c-0.2645998,0-0.5194998,0.1055002-0.7069998,0.2920008l-12.79,12.7725
                                c-0.3907,0.3906002-0.3907,1.0233994-0.001,1.414999l4.8075995,4.8145008c0.1875,0.1875,0.4424005,0.2929001,0.7070003,0.2929001
                                c0.0009999,0,0.0009999,0,0.0009999,0c0.2646999,0,0.5195003-0.1054001,0.7070003-0.2919998l12.7901001-12.7724009
                                C19.8964882,14.2632504,19.8964882,13.6303501,19.5068893,13.2387505z M6.009789,25.3042507L2.6152892,21.90485l11.375-11.3593998
                                l3.3944998,3.3993998L6.009789,25.3042507z" />
                                                    <path
                                                        d="M63.5058861,21.1958504l-12.7901001-12.7725c-0.1875-0.1865005-0.4422989-0.2920008-0.7070007-0.2920008h-0.0009995
                                c-0.2645988,0-0.5195007,0.1055002-0.7070007,0.2930002l-4.8075981,4.8144007
                                c-0.3897018,0.3915997-0.3897018,1.0244999,0.0009995,1.4150991l12.7900009,12.7724009
                                c0.1875,0.1865997,0.4423981,0.2919998,0.7069969,0.2919998h0.0010033c0.264698,0,0.5194969-0.1054001,0.7069969-0.2929001
                                l4.8077011-4.8145008C63.8964844,22.2192497,63.8964844,21.5864506,63.5058861,21.1958504z M57.9902878,25.3042507
                                l-11.375-11.3594007l3.3944969-3.3993998l11.375,11.3593998L57.9902878,25.3042507z" />
                                            </svg>
                                        </div>
                                        <div class="progress-detail">
                                            <p class="mb-2">Orações</p>
                                            <h4 class="counter">???</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1300">
                                <div class="card-body">
                                    <div class="progress-widget">
                                        <div id="circle-progress-07"
                                            class="circle-progress-01 circle-progress circle-progress-primary text-center"
                                            data-min-value="0" data-max-value="100" data-value="30"
                                            data-type="percent">
                                            <svg class="card-slie-arrow " version="1.1" id="Capa_1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                y="0px" viewBox="0 0 60 60"
                                                style="enable-background:new 0 0 60 60;" xml:space="preserve">
                                                <g>
                                                    <path
                                                        d="M15.021,20.5H9v6H4v6.021l5-0.018v14.985l6.018,0.068V32.515L20,32.497V26.5h-4.997L15.021,20.5z M18,28.5v2.003
                                l-4.982,0.018v15.013L11,45.511V30.497l-5,0.018V28.5h5v-6h2.015l-0.018,6H18z" />
                                                    <path
                                                        d="M59.292,29.544L24,18.76V2.5c0-0.386-0.223-0.738-0.572-0.904c-0.35-0.166-0.763-0.115-1.062,0.13l-22,18
                                C0.135,19.916,0,20.2,0,20.5v37c0,0.552,0.448,1,1,1h22h4h7h4h7h4h6h4c0.552,0,1-0.448,1-1v-27
                                C60,30.06,59.713,29.672,59.292,29.544z M2,20.974L22,4.61V19.5v37H2V20.974z M29,56.5v-16h3v16H29z M40,56.5v-22h3v22H40z
                                 M51,56.5v-16h2v16H51z M58,56.5h-3v-18h-6v18h-4v-24h-7v24h-4v-18h-7v18h-3V20.851L58,31.24V56.5z" />
                                            </svg>
                                        </div>
                                        <div class="progress-detail">
                                            <p class="mb-2">Cultos</p>
                                            <h4 class="counter">??</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="swiper-button swiper-button-next"></div>
                        <div class="swiper-button swiper-button-prev"></div>
                    </div>
                </div>
        </div>
        @endif
        @if ($appPermissao->view_periodo == true)
            <div class="col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" data-aos="fade-up" data-aos-delay="800">
                            <div class="card-header d-flex justify-content-between flex-wrap">
                                <div class="header-title">
                                    <h4 class="card-title">Período Financeiro</h4>
                                </div>
                                <div class="d-flex align-items-center align-self-center">
                                    <div class="d-flex align-items-center text-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g id="Solid dot2">
                                                <circle id="Ellipse 65" cx="12" cy="12" r="8"
                                                    fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                        <div class="ms-2">
                                            <span class="text-secondary">Atual</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center ms-3 text-info">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g id="Solid dot3">
                                                <circle id="Ellipse 66" cx="12" cy="12" r="8"
                                                    fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                        <div class="ms-2">
                                            <span class="text-secondary">Anterior</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center ms-3 text-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g id="Solid dot3">
                                                <circle id="Ellipse 66" cx="12" cy="12" r="8"
                                                    fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                        <div class="ms-2">
                                            <span class="text-secondary">Meta</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="periodo-financeiro" class="periodo-financeiro"></div>
                            </div>
                            @if ($meta->fin_dizimo_ano !== 0)
                                <div class="card-footer">
                                    <div class="row text-center">
                                        <div class="col-sm-12 col-md mb-sm-2 mb-0">
                                            <div class="small">Financeiro x Meta Anual</div>
                                            <div class="row text-center">
                                                <div class="col-sm-12 col-md mb-sm-2 mb-0">
                                                    <div class="small">Dizimos</div><strong>
                                                        {{ $appSystem->currency }}
                                                        {{ number_format($anodizimo, 2) }}</strong>
                                                    <div class="mt-0">
                                                        <div class="progress bg-soft-success shadow-none w-100"
                                                            style="height: 6px">
                                                            <div class="progress-bar bg-success"
                                                                data-toggle="progress-bar" role="progressbar"
                                                                aria-valuenow="{{ $porcentage_dizimo }}"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="small text-muted">{{ $appSystem->currency }}
                                                        {{ number_format($meta->fin_dizimo_ano, 2) }}</div>
                                                </div>
                                                <div class="col-sm-12 col-md mb-sm-2 mb-0">
                                                    <div class="small">Ofertas</div><strong>
                                                        {{ $appSystem->currency }}
                                                        {{ number_format($anooferta, 2) }}</strong>
                                                    <div class="mt-0">
                                                        <div class="progress bg-soft-info shadow-none w-100"
                                                            style="height: 6px">
                                                            <div class="progress-bar bg-info"
                                                                data-toggle="progress-bar" role="progressbar"
                                                                aria-valuenow="{{ $porcentage_oferta }}"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="small text-muted">{{ $appSystem->currency }}
                                                        {{ number_format($meta->fin_oferta_ano, 2) }}</div>
                                                </div>
                                                <div class="col-sm-12 col-md mb-sm-2 mb-0">
                                                    <div class="small">Doações</div><strong>
                                                        {{ $appSystem->currency }}
                                                        {{ number_format($anodoacao, 2) }}</strong>
                                                    <div class="mt-0">
                                                        <div class="progress bg-soft-warning shadow-none w-100"
                                                            style="height: 6px">
                                                            <div class="progress-bar bg-warning"
                                                                data-toggle="progress-bar" role="progressbar"
                                                                aria-valuenow="{{ $porcentage_doacao }}"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="small text-muted">{{ $appSystem->currency }}
                                                        {{ number_format($meta->fin_acao_ano, 2) }}</div>
                                                </div>
                                                <div class="col-sm-12 col-md mb-sm-2 mb-0">
                                                    <div class="small">Despesas</div><strong>
                                                        {{ $appSystem->currency }}
                                                        {{ number_format($anodespesa, 2) }}</strong>
                                                    <div class="mt-0">
                                                        <div class="progress bg-soft-danger shadow-none w-100"
                                                            style="height: 6px">
                                                            <div class="progress-bar bg-danger"
                                                                data-toggle="progress-bar" role="progressbar"
                                                                aria-valuenow="{{ $porcentage_despesa }}"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="small text-muted">{{ $appSystem->currency }}
                                                        {{ number_format($meta->fin_despesa_ano, 2) }}
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md mb-sm-2 mb-0">
                                                    <div class="small">Total</div><strong>
                                                        {{ $appSystem->currency }}
                                                        {{ number_format($totalfinanceiro, 2) }} </strong>
                                                    <div class="mt-0">
                                                        <div class="progress bg-soft shadow-none w-100"
                                                            style="height: 6px">
                                                            <div class="progress-bar" data-toggle="progress-bar"
                                                                role="progressbar"
                                                                aria-valuenow="{{ $porcentage_total }}"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="small text-muted">{{ $appSystem->currency }}
                                                        {{ number_format($metadash * 12, 2) }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
        @endif
        @if ($appPermissao->view_detail == true)
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Membresia x Meta Anual</h5>
                        <div class="card-text">
                            <div class="mt-3">
                                <div class="pb-3">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <p class="mb-0">Batismo</p>
                                        <h6>{{ $anobatismo }}</h6>
                                    </div>
                                    <div class="progress bg-soft-info shadow-none w-100" style="height: 6px">
                                        <div class="progress-bar bg-info" data-toggle="progress-bar"
                                            role="progressbar" aria-valuenow="{{ $porcentage_batismo }}"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="pb-3">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <p class="mb-0">Pessoas</p>
                                        <h6>{{ $anopessoa }}</h6>
                                    </div>
                                    <div class="progress bg-soft-info shadow-none w-100" style="height: 6px">
                                        <div class="progress-bar bg-info" data-toggle="progress-bar"
                                            role="progressbar" aria-valuenow="{{ $porcentage_pessoa }}"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="pb-3">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <p class="mb-0">Visitações</p>
                                        <h6>{{ $anovisitante }}</h6>
                                    </div>
                                    <div class="progress bg-soft-info shadow-none w-100" style="height: 6px">
                                        <div class="progress-bar bg-info" data-toggle="progress-bar"
                                            role="progressbar" aria-valuenow="{{ $porcentage_visitante }}"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="pb-3">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <p class="mb-0">Conversões</p>
                                        <h6>{{ $anoconversao }}</h6>
                                    </div>
                                    <div class="progress bg-soft-info shadow-none w-100" style="height: 6px">
                                        <div class="progress-bar bg-info" data-toggle="progress-bar"
                                            role="progressbar" aria-valuenow="{{ $porcentage_conversao }}"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="pb-3">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <p class="mb-0">Pessoas associadas aos Grupos</p>
                                        <h6>{{ $anogrupo }}</h6>
                                    </div>
                                    <div class="progress bg-soft-info shadow-none w-100" style="height: 6px">
                                        <div class="progress-bar bg-info" data-toggle="progress-bar"
                                            role="progressbar" aria-valuenow="{{ $porcentage_grupo }}"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <hr>
                                <h6 class="card-title">Gênero</h6>
                                <div class="pb-3">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <p class="mb-0">Masculino</p>
                                        <h6>{{ number_format($porcentage_m, 1) }}%</h6>
                                    </div>
                                    <div class="progress bg-soft-primary shadow-none w-100" style="height: 6px">
                                        <div class="progress-bar bg-primary" data-toggle="progress-bar"
                                            role="progressbar" aria-valuenow="{{ $porcentage_m }}"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="pb-3">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <p class="mb-0">Feminino</p>
                                        <h6>{{ number_format($porcentage_f, 1) }}%</h6>
                                    </div>
                                    <div class="progress bg-soft-warning shadow-none w-100" style="height: 6px">
                                        <div class="progress-bar bg-light" data-toggle="progress-bar"
                                            role="progressbar" aria-valuenow="{{ $porcentage_m }}"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-warning" data-toggle="progress-bar"
                                            role="progressbar" aria-valuenow="{{ $porcentage_f }}"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gráfico da membresia</h5>
                        <div class="card-body">
                            <div id="membresia" class="membresia"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (Auth::user()->menuroles == 'admin')
        <div class="col-md-12 col-lg-6">
            <div class="card" data-aos="fade-up" data-aos-delay="1200">
                <div class="card-header d-flex justify-content-between flex-wrap">
                    <div class="header-title">
                        <h4 class="card-title">Sáude da Igreja</h4><span class="badge rounded-pill bg-danger">Em
                            desenvolvimento</span>
                    </div>
                </div>
                <div class="card-body">
                    <div id="saude-igreja" class="saude-igreja"></div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-6">
            <div class="card" data-aos="fade-up" data-aos-delay="1000">
                <div class="card-header d-flex justify-content-between flex-wrap">
                    <div class="header-title">
                        <h4 class="card-title">Formas de Pagamentos</h4><span class="badge rounded-pill bg-danger">Em
                            desenvolvimento</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div id="form-pagamento" class="col-md-8 col-lg-8 form-pagamento"></div>
                        <div class="d-grid gap col-md-4 col-lg-4">
                            <div class="d-flex align-items-start">
                                <svg class="mt-2" xmlns="http://www.w3.org/2000/svg" width="14"
                                    viewBox="0 0 24 24" fill="#3a57e8">
                                    <g id="Solid dot">
                                        <circle id="Ellipse 67" cx="12" cy="12" r="8"
                                            fill="#3a57e8"></circle>
                                    </g>
                                </svg>
                                <div class="ms-3">
                                    <span class="text-secondary">Mês Atual</span>
                                    <h6>251K</h6>
                                </div>
                            </div>
                            <div class="d-flex align-items-start">
                                <svg class="mt-2" xmlns="http://www.w3.org/2000/svg" width="14"
                                    viewBox="0 0 24 24" fill="#4bc7d2">
                                    <g id="Solid dot1">
                                        <circle id="Ellipse 68" cx="12" cy="12" r="8"
                                            fill="#4bc7d2"></circle>
                                    </g>
                                </svg>
                                <div class="ms-3">
                                    <span class="text-secondary">Mês Anterior</span>
                                    <h6>176K</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script type="text/javascript">
        var options = {
            chart: {
                fontFamily: '"Inter", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"',
                height: 245,
                type: 'area',
                toolbar: {
                    show: true
                },
                sparkline: {
                    enabled: false,
                },
            },
            colors: ["#1aa053", "#f16a1b", "#c03221"],
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                dashArray: [0, 0, 5],
                width: 3,
            },
            series: [{
                    name: 'Ano Atual',
                    data: [{{ $fin_atual_jan }}, {{ $fin_atual_fev }}, {{ $fin_atual_mar }},
                        {{ $fin_atual_abr }}, {{ $fin_atual_mai }}, {{ $fin_atual_jun }},
                        {{ $fin_atual_jul }}, {{ $fin_atual_ago }}, {{ $fin_atual_set }},
                        {{ $fin_atual_out }}, {{ $fin_atual_nov }}, {{ $fin_atual_dez }}
                    ]
                }, {
                    name: 'Ano Anterior',
                    data: [{{ $fin_anterior_jan }}, {{ $fin_anterior_fev }},
                        {{ $fin_anterior_mar }}, {{ $fin_anterior_abr }},
                        {{ $fin_anterior_mai }}, {{ $fin_anterior_jun }},
                        {{ $fin_anterior_jul }}, {{ $fin_anterior_ago }},
                        {{ $fin_anterior_set }}, {{ $fin_anterior_out }},
                        {{ $fin_anterior_nov }}, {{ $fin_anterior_dez }}
                    ]
                },
                {
                    name: 'Meta',
                    data: [{{ $metadash }}, {{ $metadash }}, {{ $metadash }}, {{ $metadash }},
                        {{ $metadash }}, {{ $metadash }}, {{ $metadash }}, {{ $metadash }},
                        {{ $metadash }},
                        {{ $metadash }}, {{ $metadash }}, {{ $metadash }}
                    ]

                }
            ],
            xaxis: {
                labels: {
                    minHeight: 22,
                    maxHeight: 22,
                    show: true,
                    style: {
                        colors: "#8A92A6",
                    },
                },
                lines: {
                    show: false //or just here to disable only x axis grids
                },
                categories: ["Jan", "Feb", "Mar", "Apr", "Mai", "Jun", "Jul", "Aug", "Set", "Out", "Nov", "Dez"]
            },
            yaxis: {
                show: true,
                labels: {
                    show: true,
                    minWidth: 40,
                    maxWidth: 50,
                    style: {
                        colors: "#8A92A6",
                    },
                    offsetX: -5,
                },
            },
            legend: {
                show: false,
            },
            grid: {
                show: false,
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    type: "vertical",
                    shadeIntensity: 0,
                    gradientToColors: undefined, // optional, if not defined - uses the shades of same color in series
                    inverseColors: true,
                    opacityFrom: .4,
                    opacityTo: .1,
                    stops: [0, 50, 80],
                    colors: ["#3a57e8", "#4bc7d2"]
                }
            },
            tooltip: {
                enabled: true,
            },
        }
        var chart = new ApexCharts(document.querySelector("#periodo-financeiro"), options);
        chart.render();
    </script>

    <script type="text/javascript">
        var options = {
            series: [{{ $anovisitante }}, {{ $anobatismo }}, {{ $anoconversao }},
                {{ $anopessoa }}
            ],
            chart: {
                type: 'pie',
                width: 400,
            },
            labels: ['Visitante', 'Batismo', 'Conversão', 'Novas Pessoas'],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 220
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }],
        };
        var chart = new ApexCharts(document.querySelector("#membresia"), options);
        chart.render();
    </script>

    <script type="text/javascript">
        var options = {
            series: [{
                name: 'Dizimo',
                data: [44, 55, 57, 56, 61]
            }, {
                name: 'Oferta',
                data: [76, 85, 101, 98, 87]
            }, {
                name: 'Doações',
                data: [35, 41, 36, 26, 45]
            }, {
                name: 'Despesas',
                data: [35, 41, 36, 26, 45]
            }],
            chart: {
                type: 'bar',
                height: 230,
                stacked: true,
                toolbar: {
                    show: false
                }
            },
            colors: ["#3a57e8", "#4bc7d2", "#f16a1b", "#c03221"],
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '28%',
                    endingShape: 'rounded',
                    borderRadius: 5,
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun'],
            },
            yaxis: {
                title: {
                    text: '$ (thousands)'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "$ " + val + " thousands"
                    }
                }
            }
        };
        var chart = new ApexCharts(document.querySelector("#saude-igreja"), options);
        chart.render();
    </script>
    <script type="text/javascript">
        var options8 = {
            series: [53, 67],
            chart: {
                type: 'radialBar',
                width: 290,
                sparkline: {
                    enabled: true
                }
            },
            dataLabels: {
                enabled: false
            },
            plotOptions: {
                radialBar: {
                    hollow: {
                        margin: 0,
                        size: '50%'
                    },
                    track: {
                        margin: 1
                    },
                    dataLabels: {
                        show: false
                    }
                }
            }
        };

        var chart8 = new ApexCharts(document.querySelector("#form-pagamento"), options8);
        chart8.render();
    </script>

</x-app-layout>
