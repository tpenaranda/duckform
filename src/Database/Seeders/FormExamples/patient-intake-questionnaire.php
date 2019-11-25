<?php

return [
    'slug' => 'patient-intake-questionnaire',
    'title' => 'Duckform Patient Intake Sample Questionnaire',
    'description' => 'This is a sample questionnaire with two sections.',
    'sections' => [
        [
            // Section #1
            'title' => 'Profile Information',
            'description' => null,
            'slug' => 'profile-information',
            'order' => 1,
            'questions' => [
                [
                    'required' => true,
                    'text' => 'Name',
                    'type' => 'free_text',
                    'possibleAnswers' => [
                        []
                    ],
                ], [
                    'required' => true,
                    'text' => 'Email Address',
                    'type' => 'free_text',
                    'possibleAnswers' => [
                        []
                    ],
                ], [
                    'required' => false,
                    'text' => 'Phone Number',
                    'type' => 'free_text',
                    'possibleAnswers' => [
                        []
                    ],
                ], [
                    'required' => false,
                    'text' => 'Date of Birth',
                    'type' => 'date',
                    'possibleAnswers' => [
                        []
                    ],
                ], [
                    'required' => true,
                    'text' => 'Height',
                    'type' => 'integer',
                    'possibleAnswers' => [
                        ['text' => 'inches'],
                    ],
                ], [
                    'required' => true,
                    'text' => 'Weight',
                    'type' => 'integer',
                    'possibleAnswers' => [
                        ['text' => 'lbs'],
                    ],
                ], [
                    'randomize_possible_answers' => true,
                    'required' => false,
                    'text' => 'Are you under the care of any of the following?',
                    'type' => 'multiselect',
                    'possibleAnswers' => [
                        ['text' => 'Primary Care Doctor'],
                        ['text' => 'Osteopath'],
                        ['text' => 'Chiropractor'],
                        ['text' => 'Naturopath'],
                        ['text' => 'Cardiologist'],
                        ['text' => 'Rheumatologist'],
                        ['text' => 'Gastroenterologist'],
                        ['text' => 'Neurologist'],
                        ['text' => 'Endocrinologist'],
                        ['text' => 'Acupuncturist'],
                        ['text' => 'Other', 'order' => 1],
                    ],
                ],
            ],
        ], [
            // Section #2
            'title' => 'Medical History',
            'description' => null,
            'slug' => 'medical-history',
            'order' => 2,
            'questions' => [
                [
                    'randomize_possible_answers' => false,
                    'required' => false,
                    'text' => 'How motivated are you to accomplish your goal?',
                    'type' => 'single_select',
                    'possibleAnswers' => [
                        ['text' => "Very motivated - Let's do this!"],
                        ['text' => 'Semi-motivated - I will try my hardest.'],
                        ['text' => 'Still trying to find my motivation.'],
                    ],
                ], [
                    'randomize_possible_answers' => false,
                    'required' => true,
                    'text' => 'I am motivated to change my diet',
                    'type' => 'scale',
                    'possibleAnswers' => [
                        ['text' => 'Not Motivated'],
                        ['text' => null],
                        ['text' => null],
                        ['text' => null],
                        ['text' => null],
                        ['text' => null],
                        ['text' => null],
                        ['text' => null],
                        ['text' => null],
                        ['text' => 'Very Motivated'],
                    ],
                ], [
                    'randomize_possible_answers' => false,
                    'required' => true,
                    'text' => 'I am motivated to get on a supplement routine',
                    'type' => 'scale',
                    'possibleAnswers' => [
                        ['text' => 'Nothing'],
                        ['text' => null],
                        ['text' => null],
                        ['text' => null],
                        ['text' => 'A lot!'],
                    ],
                ], [
                    'randomize_possible_answers' => false,
                    'required' => true,
                    'text' => 'I am motivated to make lifestyle changes',
                    'type' => 'scale',
                    'possibleAnswers' => [
                        ['text' => 'Not Motivated'],
                        ['text' => null],
                        ['text' => null],
                        ['text' => null],
                        ['text' => null],
                        ['text' => null],
                        ['text' => null],
                        ['text' => null],
                        ['text' => null],
                        ['text' => 'Very Motivated'],
                    ],
                ], [
                    'randomize_possible_answers' => false,
                    'required' => false,
                    'text' => 'I have a gallbladder',
                    'type' => 'yes_no',
                    'possibleAnswers' => [
                        ['text' => 'Yes'],
                        ['text' => 'No'],
                    ],
                ], [
                    'randomize_possible_answers' => false,
                    'required' => false,
                    'text' => 'Blood Sugar / Metabolism',
                    'type' => 'multiselect',
                    'possibleAnswers' => [
                        ['text' => 'Dizzy upon standing'],
                        ['text' => 'Tiredness or sugar craving directly after a meal'],
                        ['text' => 'Not hungry for breakfast'],
                        ['text' => 'Difficulty gaining weight'],
                        ['text' => 'Difficulty losing weight'],
                        ['text' => 'Poor circulation'],
                        ['text' => 'None of the above'],
                        ['text' => 'Other', 'order' => 1],
                    ],
                ],
            ],
        ],
    ],
];
