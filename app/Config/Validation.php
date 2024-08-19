<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public $login_validation = [
        'username' => [
            'rules'         => 'required|alpha_numeric_punct',
            'errors'        => [
                'required'  => 'username harus di isi.',
                'alpha_numeric_punct'  => 'Format(karakter) Tidak Di izinkan.',
            
            ]
        ],

        'password' => [
            'rules'         => 'required',
            'errors'        => [
                'required'  => 'password harus di isi.',
               
            ]
        ],

        'Branch' => [
            'rules'         => 'required',
            'errors'        => [
                'required'  => 'Cabang Harus Di Pilih Salah Satu.',
               
            ]
        ],
    ];



    public $parts_divisi_validation = [
        // 'PartName' => [
        //     'rules'         => 'required',
        //     'errors'        => [
        //         'required'  => 'Part Name harus di isi.',          
        //     ]
        // ],

        'partID' => [
            'rules'         => 'required|is_unique[ms_part_divisi.partID]',
            'errors'        => [
                'required'  => 'Part ID harus di isi.',  
                'is_unique'  => 'Part ID Sudah Tersedia',        
            ]
        ],

        'divisiID' => [
            'rules'         => 'required',
            'errors'        => [
                'required'  => 'Divisi harus di isi.',
               
            ]
        ],

        'standart_Pack' => [
            'rules'         => 'required|numeric',
            'errors'        => [
                'required'  => 'Standar Packing Pack harus di isi.',
                'numeric'  => 'Harus Angka.',
               
            ]
        ],

        'unitID_StdPack' => [
            'rules'         => 'required',
            'errors'        => [
                'required'  => 'Unit ID StdPack Pack harus di isi.',
               
            ]
        ],

        'safety_Stock' => [
            'rules'         => 'required|numeric',
            'errors'        => [
                'required'  => 'Safety Stock Pack harus di isi.',
                'numeric'  => 'Harus Angka.',
               
            ]
        ],

        'minimum_Order' => [
            'rules'         => 'required|numeric',
            'errors'        => [
                'required'  => 'minimum Order Pack harus di isi.',
                'numeric'  => 'Harus Angka.',
               
            ]
        ],

        'UnitID_Stock' => [
            'rules'         => 'required',
            'errors'        => [
                'required'  => 'Unit ID Stock harus di isi.',
               
            ]
        ],

        'isActive' => [
            'rules'         => 'required',
            'errors'        => [
                'required'  => 'Status harus di isi.',
               
            ]
        ],
    ];

    public $parts_divisi_validation_updt = [
        // 'PartName' => [
        //     'rules'         => 'required',
        //     'errors'        => [
        //         'required'  => 'Part Name harus di isi.',          
        //     ]
        // ],

        'partID' => [
            'rules'         => 'required',
            'errors'        => [
                'required'  => 'Part ID harus di isi.',          
            ]
        ],

        'divisiID' => [
            'rules'         => 'required',
            'errors'        => [
                'required'  => 'Divisi harus di isi.',
               
            ]
        ],

        'standart_Pack' => [
            'rules'         => 'required|numeric',
            'errors'        => [
                'required'  => 'Standar Packing Pack harus di isi.',
                'numeric'  => 'Harus Angka.',
               
            ]
        ],

        'unitID_StdPack' => [
            'rules'         => 'required',
            'errors'        => [
                'required'  => 'Unit ID StdPack Pack harus di isi.',
               
            ]
        ],

        'safety_Stock' => [
            'rules'         => 'required|numeric',
            'errors'        => [
                'required'  => 'Safety Stock Pack harus di isi.',
                'numeric'  => 'Harus Angka.',
               
            ]
        ],

        'minimum_Order' => [
            'rules'         => 'required|numeric',
            'errors'        => [
                'required'  => 'minimum Order Pack harus di isi.',
                'numeric'  => 'Harus Angka.',
               
            ]
        ],

        'UnitID_Stock' => [
            'rules'         => 'required',
            'errors'        => [
                'required'  => 'Unit ID Stock harus di isi.',
               
            ]
        ],

        'isActive' => [
            'rules'         => 'required',
            'errors'        => [
                'required'  => 'Status harus di isi.',
               
            ]
        ],
    ];
}
