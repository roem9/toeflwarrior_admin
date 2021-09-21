<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subsoal extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("Main_model");
        $this->load->model("Other_model");
    }
    
    public function index(){
        // navbar and sidebar
        $data['menu'] = "Subsoal";

        // for title and header 
        $data['title'] = "List Sub Soal";

        // for modal 
        $data['modal'] = [
            "modal_subsoal",
            "modal_setting"
        ];
        
        // javascript 
        $data['js'] = [
            "ajax.js",
            "function.js",
            "helper.js",
            "modules/setting.js",
            "modules/subsoal.js",
            "load_data/subsoal_reload.js",
        ];

        // $this->load->view("pages/subsoal/list-soal", $data);
        $this->load->view("pages/subsoal/list", $data);
    }

    public function edit($id){
        $soal = $this->Main_model->get_one("sub_soal", ["md5(id_sub)" => $id, "hapus" => 0]);
        
        // id soal 
        $data['id'] = $id;
        $data['title'] = "List Soal " . $soal['nama_sub'];
        
        $data['menu'] = "Item";

        // for modal 
        $data['modal'] = [
            "modal_item_soal",
            "modal_setting"
        ];
        
        // javascript 
        $data['js'] = [
            "ajax.js",
            "function.js",
            "helper.js",
            "modules/setting.js",
            "modules/item_soal.js",
            // "load_data/reload_soal_listening.js",
            "load_data/item_soal_reload.js",
        ];

        // $this->load->view("pages/subsoal/list-soal", $data);
        $this->load->view("pages/subsoal/list-item", $data);
    }

    public function hasil($id){
        // navbar and sidebar
        $data['menu'] = "Soal";

        // for title and header 
        $data['title'] = "List Hasil Soal";

        $respon = $this->Main_model->get_all("peserta", ["md5(id_sub)" => $id]);
        $data['respon'] = [];
        foreach ($respon as $i => $respon) {
            $data['respon'][$i] = $respon;
            $jawaban = explode("###", $respon['text']);
            $data['respon'][$i]['text'] = $jawaban;
        }

        $this->load->view("pages/subsoal/hasil-soal", $data);
    }

    public function loadSubSoal(){
        header('Content-Type: application/json');
        $output = $this->subsoal->loadSubSoal();
        echo $output;
    }

    public function add_subsoal(){
        $data = $this->subsoal->add_subsoal();
        echo json_encode($data);
    }
    
    public function get_subsoal(){
        $data = $this->subsoal->get_subsoal();
        echo json_encode($data);
    }

    public function update_subsoal(){
        $data = $this->subsoal->update_subsoal();
        echo json_encode($data);
    }

    public function delete_subsoal(){
        $data = $this->subsoal->delete_subsoal();
        echo json_encode($data);
    }

    public function add_item_soal(){
        $data = $this->subsoal->add_item_soal();
        echo json_encode($data);
    }

    public function get_all_item_soal(){
        $data = $this->subsoal->get_all_item_soal();
        echo json_encode($data);
    }

    public function get_item_soal(){
        $data = $this->subsoal->get_item_soal();
        echo json_encode($data);
    }
    
    public function edit_item_soal(){
        $data = $this->subsoal->edit_item_soal();
        echo json_encode($data);
    }

    public function edit_urutan_soal(){
        $data = $this->subsoal->edit_urutan_soal();
        echo json_encode($data);
    }

    public function hapus_item_soal(){
        $data = $this->subsoal->hapus_item_soal();
        echo json_encode($data);
    }

    public function input($id){
        $this->Main_model->delete_data("item_soal", ["id_sub" => $id]);

        if($id == 1){
            $data = [
                [
                    "tipe" => "petunjuk",
                    "data" => "Pre Test"
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "1",
                        "soal" => "
                                Many modern mobile devices are ______ to use.
                        ",
                        "pilihan" => [
                            "Complication",
                            "Complicates",
                            "Complicate",
                            "Complicated",
                        ],
                        "jawaban" => "Complicated",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "2",
                        "soal" => "
                                The pipelines _______ huge quantities of natural gas
                        ",
                        "pilihan" => [
                            "Transport",
                            "Transported",
                            "Transportation",
                            "Transports",
                        ],
                        "jawaban" => "Transport",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "3",
                        "soal" => "
                                The money ________ taken away from the bank
                        ",
                        "pilihan" => [
                            "Has",
                            "Has been",
                            "Have",
                            "Have been",
                        ],
                        "jawaban" => "Has been",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "4",
                        "soal" => "
                                The competition ________ by them.
                        ",
                        "pilihan" => [
                            "Is win",
                            "Is won",
                            "Is winner",
                            "Is winning",
                        ],
                        "jawaban" => "Is won",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "5",
                        "soal" => "
                                He bought her a ______________.
                        ",
                        "pilihan" => [
                            "Red beautiful dress",
                            "Dress beautiful red",
                            "Beautiful red dress",
                            "Red dress beautiful",
                        ],
                        "jawaban" => "Beautiful red dress",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "6",
                        "soal" => "
                                Yesterday, each student _________ by the teacher
                        ",
                        "pilihan" => [
                            "Is punished",
                            "Was punished",
                            "Are punished",
                            "Were punished",
                        ],
                        "jawaban" => "Was punished",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "7",
                        "soal" => "
                                Seldom ________  this beautiful music throughout my life
                        ",
                        "pilihan" => [
                            "I have heard",
                            "Have I heard",
                            "I have been heard",
                            "Have been I heard",
                        ],
                        "jawaban" => "Have I heard",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "8",
                        "soal" => "
                                The novel _____________ by Andi will be published tomorrow
                        ",
                        "pilihan" => [
                            "write",
                            "writing",
                            "Being written",
                            "Has been wrote",
                        ],
                        "jawaban" => "Being written",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "9",
                        "soal" => "
                                The scientist have wondered _______ life exists or not elsewhere in the universe.
                        ",
                        "pilihan" => [
                            "Whether",
                            "Because",
                            "Where",
                            "As",
                        ],
                        "jawaban" => "Whether",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "10",
                        "soal" => "
                                The doctor ________ two sons stands in front of the office.
                        ",
                        "pilihan" => [
                            "Whose",
                            "Whom",
                            "Which has",
                            "Who has",
                        ],
                        "jawaban" => "Who has",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "11",
                        "soal" => "
                                The art of storytelling _________ almost as old as humanity.
                        ",
                        "pilihan" => [
                            "That is",
                            "Is",
                            "It is",
                            "Being",
                        ],
                        "jawaban" => "Is",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "12",
                        "soal" => "
                                Buffalo Bill, _____________, operated his own Wild West Show.
                        ",
                        "pilihan" => [
                            "Is a famous frontiersman",
                            "A famous frontiersman",
                            "Which is a famous frontiersman",
                        ],
                        "jawaban" => "A famous frontiersman",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "13",
                        "soal" => "
                                <u>During</u> solar storm, the <u>amount</u> of radiation <u>reaching</u> the Earth is <u>abnormal</u> high. <br>Which underlined word is not grammatically correct?
                        ",
                        "pilihan" => [
                            "During",
                            "Amount",
                            "Reaching",
                            "Abnormal",
                        ],
                        "jawaban" => "Abnormal",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "14",
                        "soal" => "
                                Many universities receive grants to _____ research for the federal government.
                        ",
                        "pilihan" => [
                            "Do",
                            "Make",
                        ],
                        "jawaban" => "Do",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "15",
                        "soal" => "
                                As <u>childs</u> grow <u>older</u>, <u>their</u> bones become <u>thicker</u> and longer.<br>Which underlined word is not grammatically correct?
                        ",
                        "pilihan" => [
                            "Childs",
                            "Older",
                            "Their",
                            "Thicker",
                        ],
                        "jawaban" => "Childs",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "16",
                        "soal" => "
                                The story of the motel business from 1920 to the start of World War II in 1941 is one of uninterrupted growth. Motels spread from the West and the Midwest all the way to Maine and Florida. There were 16.000 motels by 1930 and 24.000 by 1940. The motel industry was one of the few industries that was not hurt by the Depression of the 1930’s. Their cheap rates attracted travelers who had very little money. <br>What does the passage mainly discuss?
                        ",
                        "pilihan" => [
                            "How the Depression hurt U.S. motels",
                            "The impact of transcontinental highways",
                            "Two decades of growth for the motel industry",
                        ],
                        "jawaban" => "Two decades of growth for the motel industry",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "17",
                        "soal" => "
                                The Civil War created extremely rapid manufacturing activity to supply critical material, especially in the North. <br>Which of the following is closest in meaning with the word “critical”?
                        ",
                        "pilihan" => [
                            "Industrial",
                            "Serious",
                            "Crucial",
                            "Insulting",
                        ],
                        "jawaban" => "Crucial",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "18",
                        "soal" => "
                                Florist often refrigerate cut flowers to protect their fresh appearance. <br>The word “their” refers to..
                        ",
                        "pilihan" => [
                            "Florist’",
                            "Flowers’",
                        ],
                        "jawaban" => "Flowers’",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "19",
                        "soal" => "
                
                        ",
                        "pilihan" => [
                            " He’s a pilot",
                            " He’s a flight attendant",
                            " He’s a member of ground crew",
                            " He works clearing the land",
                        ],
                        "jawaban" => " He’s a pilot",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => "20",
                        "soal" => "
                
                        ",
                        "pilihan" => [
                            " In an airplane",
                            " In a police car",
                            " In a theater",
                            " At a fireworks exhibit",
                        ],
                        "jawaban" => " In a theater",
                    ]
                ]
            ];
        }

        foreach ($data as $i => $data) {
            $datas['id_sub'] = $id;
            $datas['item'] = $data['tipe'];

            if($data['tipe'] == 'soal'){
                $pilihan = "";
                foreach ($data['data']['pilihan'] as $pil) {
                    $pilihan .= "\"".$pil."\",";
                }
                $pilihan = substr($pilihan, 0, -1);
                $data_soal = "{\"soal\":\"<p>{no}".str_replace('"', '\"', $data['data']['soal'])."</p>\",\"pilihan\":[".$pilihan."],\"jawaban\":\"".$data['data']['jawaban']."\"}";
            } elseif($data['tipe'] == "audio") {
                $audio = $this->Main_model->get_one("audio", ["nama_audio" => str_replace(".mp3", "", $data['data'])]);
                $data_soal = $audio['id_audio'];
            } elseif ($data['tipe'] == "petunjuk") {
                $data_soal = $data['data'];
            }

            $datas['data'] = $data_soal;
            $datas['penulisan'] = "LTR";
            $datas['urutan'] = $i + 1;

            $this->subsoal->add_data("item_soal", $datas);
        }

        // echo "Selesai";
        redirect(base_url('subsoal'));
    }
}

/* End of file Soal.php */