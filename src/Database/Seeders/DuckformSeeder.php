<?php

namespace TPenaranda\Duckform\Database\Seeders;

use Illuminate\Database\Seeder;
use TPenaranda\Duckform\Facade\Duckform;
use TPenaranda\Duckform\Models\{PossibleAnswer, Question, Form, Section};

class DuckformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Form::all()->each->forceDelete();

        $form = Duckform::factory(Form::class)->create([
            'slug' => 'the_quartz_clinic_questionnaire',
            'title' => 'TQC Intake Questionnaire',
            'description' => 'Here is where I get to know you further!. Please fill out the follow questionnaire before our meeting!.'
        ]);

        $sectionsData = [
            // Section #1
            [
                'title' => 'Profile Information',
                'description' => null,
                'slug' => 'profile_information',
                'order' => 1,
                'questions' => [
                    [
                        'randomize_possible_answers' => false,
                        'required' => true,
                        'text' => 'Name',
                        'type' => 'free_text',
                        'possibleAnswers' => [
                            ['text' => null],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => true,
                        'text' => 'Email Address',
                        'type' => 'free_text',
                        'possibleAnswers' => [
                            ['text' => null],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => true,
                        'text' => 'Phone Number',
                        'type' => 'free_text',
                        'possibleAnswers' => [
                            ['text' => null],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => true,
                        'text' => 'City, State, Zip Code',
                        'type' => 'free_text',
                        'possibleAnswers' => [
                            ['text' => null],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => true,
                        'text' => 'Date of Birth',
                        'type' => 'date',
                        'possibleAnswers' => [
                            ['text' => null],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => true,
                        'text' => 'Gender',
                        'type' => 'free_text',
                        'possibleAnswers' => [
                            ['text' => null],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => true,
                        'text' => 'Height',
                        'type' => 'integer',
                        'possibleAnswers' => [
                            [
                                'text' => 'inches',
                            ],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => true,
                        'text' => 'Weight',
                        'type' => 'integer',
                        'possibleAnswers' => [
                            [
                                'text' => 'lbs',
                            ],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => false,
                        'text' => 'How did you hear about The Quartz Clinic?',
                        'type' => 'single_select',
                        'possibleAnswers' => [
                            [
                                'text' => 'Website',
                                'order' => 1,
                            ], [
                                'text' => 'Referral through a doctor',
                                'order' => 2,
                            ], [
                                'text' => 'Referral through a friend',
                                'order' => 3,
                            ], [
                                'text' => 'Social Media',
                                'order' => 4,
                            ], [
                                'text' => 'Other',
                                'order' => 5,
                            ],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => false,
                        'text' => 'Are you under the care of any of the following?',
                        'type' => 'multiselect',
                        'possibleAnswers' => [
                            [
                                'text' => 'Primary Care Doctor',
                            ], [
                                'text' => 'Osteopath',
                            ], [
                                'text' => 'Chiropractor',
                            ], [
                                'text' => 'Naturopath',
                            ], [
                                'text' => 'Cardiologist',
                            ], [
                                'text' => 'Rheumatologist',
                            ], [
                                'text' => 'Gastroenterologist',
                            ], [
                                'text' => 'Neurologist',
                            ], [
                                'text' => 'Endocrinologist',
                            ], [
                                'text' => 'Acupuncturist',
                            ],
                                                        [
                                'text' => 'Other',
                                'order' => 1,
                            ],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => false,
                        'text' => 'My health goals are:',
                        'type' => 'free_text',
                        'possibleAnswers' => [
                            ['text' => null],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => false,
                        'text' => 'My main concerns / complaints are:',
                        'type' => 'free_text',
                        'possibleAnswers' => [
                            ['text' => null],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => false,
                        'text' => 'These concerns / complaints worsen when I:',
                        'type' => 'free_text',
                        'possibleAnswers' => [
                            ['text' => null],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => false,
                        'text' => 'Did something trigger these health concerns? (i.e. a specific event)',
                        'type' => 'free_text',
                        'possibleAnswers' => [
                            ['text' => null],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => false,
                        'text' => 'When was the last time you felt 100%?',
                        'type' => 'free_text',
                        'possibleAnswers' => [
                            ['text' => null],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => true,
                        'text' => 'Explain your background and previous health history',
                        'type' => 'free_text',
                        'possibleAnswers' => [
                            ['text' => null],
                        ],
                    ], [
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
                        'type' => 'scale_1-10',
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
                        'type' => 'scale_1-10',
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
                        'text' => 'I am motivated to make lifestyle changes',
                        'type' => 'scale_1-10',
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
                    ],
                ],
            ],
            // Section #2
            [
                'title' => 'Medical History',
                'description' => null,
                'slug' => 'medical_history',
                'order' => 2,
                'questions' => [
                    [
                        'randomize_possible_answers' => true,
                        'required' => false,
                        'text' => 'I have been diagnosed with the following:',
                        'type' => 'multiselect',
                        'possibleAnswers' => [
                            ['text' => 'Celiac disease'],
                            ['text' => 'Irritable bowel syndrome'],
                            ['text' => 'Crohns / Ulcerative colitis'],
                            ['text' => 'Type 1 Diabetes'],
                            ['text' => 'Type 2 Diabetes'],
                            ['text' => 'Insulin resistance'],
                            ['text' => 'Hypothyroidism / Hyperthyroidism'],
                            ['text' => 'PCOS'],
                            ['text' => 'Eating disorder'],
                            ['text' => 'Obesity'],
                            ['text' => 'Heart attack'],
                            ['text' => 'Stroke'],
                            ['text' => 'Hypertension'],
                            ['text' => 'Anemia'],
                            ['text' => 'Kidney stones'],
                            ['text' => 'Rheumatoid Arthritis'],
                            ['text' => 'Lupus'],
                            ['text' => 'Atherosclerosis'],
                            ['text' => 'Cancer'],
                            ['text' => 'Depression'],
                            ['text' => 'Bipolar Disorder'],
                            ['text' => 'Migraines'],
                            ['text' => 'Anxiety'],
                            ['text' => 'Parkinson’s'],
                            ['text' => 'Dementia / Alzheimer’s'],
                            ['text' => 'Multiple Sclerosis'],
                            ['text' => 'Food Allergies'],
                            ['text' => 'None of the above'],
                            ['text' => 'Other', 'order' => 1],
                        ],
                    ], [
                        'randomize_possible_answers' => true,
                        'required' => false,
                        'text' => 'I have been diagnosed with the following:',
                        'type' => 'multiselect',
                        'possibleAnswers' => [
                            ['text' => 'Celiac disease'],
                            ['text' => 'Irritable bowel syndrome'],
                            ['text' => 'Crohns / Ulcerative colitis'],
                            ['text' => 'Type 1 Diabetes'],
                            ['text' => 'Type 2 Diabetes'],
                            ['text' => 'Insulin resistance'],
                            ['text' => 'Hypothyroidism / Hyperthyroidism'],
                            ['text' => 'PCOS'],
                            ['text' => 'Eating disorder'],
                            ['text' => 'Obesity'],
                            ['text' => 'Heart attack'],
                            ['text' => 'Stroke'],
                            ['text' => 'Hypertension'],
                            ['text' => 'Anemia'],
                            ['text' => 'Kidney stones'],
                            ['text' => 'Rheumatoid Arthritis'],
                            ['text' => 'Lupus'],
                            ['text' => 'Atherosclerosis'],
                            ['text' => 'Cancer'],
                            ['text' => 'Depression'],
                            ['text' => 'Bipolar Disorder'],
                            ['text' => 'Migraines'],
                            ['text' => 'Anxiety'],
                            ['text' => 'Parkinson’s'],
                            ['text' => 'Dementia / Alzheimer’s'],
                            ['text' => 'Multiple Sclerosis'],
                            ['text' => 'Food Allergies'],
                            ['text' => 'None of the above'],
                            ['text' => 'Other', 'order' => 1],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => false,
                        'text' => 'When I was born, I was',
                        'type' => 'single_select',
                        'possibleAnswers' => [
                            ['text' => 'Primarily breast-fed'],
                            ['text' => 'Primarily formula-fed'],
                            ['text' => 'Both breast and formula fed'],
                            ['text' => "I don't know"],
                            ['text' => 'Other', 'order' => 1],
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
                        'required' => true,
                        'text' => 'I have taken an antibiotic within the last year',
                        'type' => 'yes_no',
                        'possibleAnswers' => [
                            ['text' => 'Yes'],
                            ['text' => 'No'],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => true,
                        'text' => 'I take the following medications',
                        'type' => 'free_text',
                        'possibleAnswers' => [
                            ['text' => null],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => true,
                        'text' => 'I take the following supplements',
                        'type' => 'free_text',
                        'possibleAnswers' => [
                            ['text' => null],
                        ],
                    ],
                ],
            ],
        ];

        foreach ($sectionsData as $sectionData) {
            $section = Duckform::factory(Section::class)->create(array_merge(['form_id' => $form->id],
                array_only($sectionData, ['description', 'order', 'slug', 'title'])
            ));

            foreach ($sectionData['questions'] as $questionData) {
                $question = Duckform::factory(Question::class)->create(array_merge(['section_id' => $section->id],
                    array_only($questionData, ['randomize_possible_answers', 'required', 'text', 'type'])
                ));

                foreach ($questionData['possibleAnswers'] as $possibleAnswerData) {
                    Duckform::factory(PossibleAnswer::class)->create(array_merge(['question_id' => $question->id],
                        array_only($possibleAnswerData, ['text', 'order'])
                    ));
                }
            }
        }

        $this->command->getOutput()->writeln('<info>Form Token:</info>' . $form->getToken());

    }
}
