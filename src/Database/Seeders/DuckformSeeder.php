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
            'title' => 'Intake Questionnaire',
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
            // Section #3
            [
                'title' => 'Eating',
                'description' => null,
                'slug' => 'eating',
                'order' => 3,
                'questions' => [
                    [
                        'randomize_possible_answers' => false,
                        'required' => false,
                        'text' => 'Describe your typical breakfast',
                        'type' => 'free_text',
                        'possibleAnswers' => [
                            ['text' => null],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => true,
                        'text' => 'What did you have for breakfast yesterday?',
                        'type' => 'free_text',
                        'possibleAnswers' => [
                            ['text' => null],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => false,
                        'text' => 'Describe your typical lunch',
                        'type' => 'free_text',
                        'possibleAnswers' => [
                            ['text' => null],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => true,
                        'text' => 'What did you have for lunch yesterday?',
                        'type' => 'free_text',
                        'possibleAnswers' => [
                            ['text' => null],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => false,
                        'text' => 'Describe your typical dinner',
                        'type' => 'free_text',
                        'possibleAnswers' => [
                            ['text' => null],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => true,
                        'text' => 'What did you have for dinner yesterday?',
                        'type' => 'free_text',
                        'possibleAnswers' => [
                            ['text' => null],
                        ],
                    ], [
                        'randomize_possible_answers' => true,
                        'required' => false,
                        'text' => 'I tend to follow the following special type of diet',
                        'type' => 'multiselect',
                        'possibleAnswers' => [
                            ['text' => 'Vegan / Vegetarian'],
                            ['text' => 'Paleo'],
                            ['text' => 'Keto'],
                            ['text' => 'Gluten Free'],
                            ['text' => 'Dairy Free'],
                            ['text' => 'Low Fat'],
                            ['text' => 'Low Carb'],
                            ['text' => 'None of the above'],
                            ['text' => 'Other', 'order' => 1],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => false,
                        'text' => 'I have the following food sensitivities',
                        'type' => 'free_text',
                        'possibleAnswers' => [
                            ['text' => null],
                        ],
                    ], [
                        'randomize_possible_answers' => true,
                        'required' => false,
                        'text' => 'I eat snacks',
                        'type' => 'single_select',
                        'possibleAnswers' => [
                            ['text' => 'Multiple times a day'],
                            ['text' => 'Once daily'],
                            ['text' => 'Sometimes'],
                            ['text' => 'Never'],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => true,
                        'text' => 'My go-to snacks are',
                        'type' => 'free_text',
                        'possibleAnswers' => [
                            ['text' => null],
                        ],
                    ], [
                        'randomize_possible_answers' => true,
                        'required' => false,
                        'text' => 'I intermittent fast',
                        'type' => 'single_select',
                        'possibleAnswers' => [
                            ['text' => 'Often'],
                            ['text' => 'Sometimes'],
                            ['text' => 'Never'],
                        ],
                    ], [
                        'randomize_possible_answers' => true,
                        'required' => false,
                        'text' => 'When it comes to sugar',
                        'type' => 'single_select',
                        'possibleAnswers' => [
                            ['text' => 'I love sweets and eat them often'],
                            ['text' => 'I have one treat a day'],
                            ['text' => 'I crave sugar but try to avoid it'],
                            ['text' => 'I avoid all sugar and sweeteners'],
                        ],
                    ], [
                        'randomize_possible_answers' => true,
                        'required' => false,
                        'text' => 'I eat out (?) times a week',
                        'type' => 'single_select',
                        'possibleAnswers' => [
                            ['text' => '0-1'],
                            ['text' => '1-3'],
                            ['text' => '3-5'],
                            ['text' => 'More than 5'],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => false,
                        'text' => 'I eat a variety of foods throughout the week',
                        'type' => 'yes_no',
                        'possibleAnswers' => [
                            ['text' => 'Yes'],
                            ['text' => 'No, I typically stick to the same foods'],
                        ],
                    ], [
                        'randomize_possible_answers' => true,
                        'required' => false,
                        'text' => 'I drink (?) 8 oz glasses of water per day',
                        'type' => 'single_select',
                        'possibleAnswers' => [
                            ['text' => 'Less than 2'],
                            ['text' => '2-4'],
                            ['text' => '5-7'],
                            ['text' => '8 or more'],
                        ],
                    ], [
                        'randomize_possible_answers' => true,
                        'required' => false,
                        'text' => 'When it comes to caffeinated beverages, I drink',
                        'type' => 'single_select',
                        'possibleAnswers' => [
                            ['text' => '1 cup a day'],
                            ['text' => '2-4 cups a day'],
                            ['text' => '> 4 cups a day'],
                            ['text' => 'I do not drink coffee, tea, or any other caffeinated beverages'],
                        ],
                    ], [
                        'randomize_possible_answers' => true,
                        'required' => false,
                        'text' => 'When it comes to alcohol, I drink',
                        'type' => 'single_select',
                        'possibleAnswers' => [
                            ['text' => '9+ drinks a week'],
                            ['text' => '4-8 drinks a week'],
                            ['text' => '1-3 drinks a week'],
                            ['text' => 'Rarely'],
                            ['text' => 'Never'],
                        ],
                    ], [
                        'randomize_possible_answers' => true,
                        'required' => false,
                        'text' => 'I smoke',
                        'type' => 'single_select',
                        'possibleAnswers' => [
                            ['text' => 'Regularly'],
                            ['text' => 'On occasion'],
                            ['text' => 'I recently quit'],
                            ['text' => 'I quit years ago'],
                            ['text' => 'Never'],
                        ],
                    ]
                ],
            ],
            // Section #4
            [
                'title' => 'Lifestyle',
                'description' => null,
                'slug' => 'lifestyle',
                'order' => 4,
                'questions' => [
                    [
                        'randomize_possible_answers' => false,
                        'required' => false,
                        'text' => 'Over the last week, my typical energy levels was',
                        'type' => 'scale_1-10',
                        'possibleAnswers' => [
                            ['text' => 'Little to no energy'],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => 'Great amount of energy!'],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => false,
                        'text' => 'I exercise',
                        'type' => 'single_select',
                        'possibleAnswers' => [
                            ['text' => '5+ times a week'],
                            ['text' => '2-4 times a week'],
                            ['text' => '1x a week'],
                            ['text' => 'Rarely or never'],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => true,
                        'text' => 'Describe your typical workout routine. Please include type, number of times per week, and duration. Write N/A if you do not exercise.',
                        'type' => 'free_text',
                        'possibleAnswers' => [
                            ['text' => null],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => false,
                        'text' => 'I feel motivated to exercise',
                        'type' => 'yes_no',
                        'possibleAnswers' => [
                            ['text' => 'Yes'],
                            ['text' => 'No - It takes a lot of effort'],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => false,
                        'text' => "I struggle to get a full night's sleep",
                        'type' => 'single_select',
                        'possibleAnswers' => [
                            ['text' => 'Always'],
                            ['text' => 'Sometimes'],
                            ['text' => 'Rarely'],
                            ['text' => 'Never'],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => false,
                        'text' => 'I get (?) hours of sleep a night on average',
                        'type' => 'scale_1-10',
                        'possibleAnswers' => [
                            ['text' => 'One hour'],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => 'Ten hours'],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => false,
                        'text' => 'When I wake up, I feel well rested',
                        'type' => 'single_select',
                        'possibleAnswers' => [
                            ['text' => 'Always'],
                            ['text' => 'Sometimes'],
                            ['text' => 'Rarely'],
                            ['text' => 'Never'],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => false,
                        'text' => 'I feel overwhelmed by stress',
                        'type' => 'single_select',
                        'possibleAnswers' => [
                            ['text' => 'Often'],
                            ['text' => 'Sometimes'],
                            ['text' => 'Rarely'],
                            ['text' => 'Never'],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => false,
                        'text' => 'On a daily basis, I feel stress from work',
                        'type' => 'scale_1-10',
                        'possibleAnswers' => [
                            ['text' => 'Little to no stress'],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => 'High amount of stress'],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => false,
                        'text' => 'On a daily basis, I feel stress from family',
                        'type' => 'scale_1-10',
                        'possibleAnswers' => [
                            ['text' => 'Little to no stress'],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => 'High amount of stress'],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => false,
                        'text' => 'On a daily basis, I feel stress from finances',
                        'type' => 'scale_1-10',
                        'possibleAnswers' => [
                            ['text' => 'Little to no stress'],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => 'High amount of stress'],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => false,
                        'text' => 'On a daily basis, I feel stress from my health',
                        'type' => 'scale_1-10',
                        'possibleAnswers' => [
                            ['text' => 'Little to no stress'],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => 'High amount of stress'],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => false,
                        'text' => 'On a daily basis, I feel stress from social situations',
                        'type' => 'scale_1-10',
                        'possibleAnswers' => [
                            ['text' => 'Little to no stress'],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => null],
                            ['text' => 'High amount of stress'],
                        ],
                    ], [
                        'randomize_possible_answers' => true,
                        'required' => true,
                        'text' => 'Toxin Exposure: The following apply to me',
                        'type' => 'multiselect',
                        'possibleAnswers' => [
                            ['text' => 'I consume conventionally grown (non-organic) fruits and vegetables regularly'],
                            ['text' => 'I consume conventionally raised animal products (meat, dairy, eggs) regularly'],
                            ['text' => 'I consume fast foods, canned/packaged foods, soda, or foods with artificial colors, flavors, preservatives or sweeteners more than three times a week'],
                            ['text' => 'I have recently been exposed to new construction materials or furniture (e.g., paint, laminate flooring, particle board, new carpeting, bedding, furniture, etc.)'],
                            ['text' => 'I am often exposed to adhesives, paints, flea treatments, varnishes, solvents, welding/soldering materials, or other air-borne chemicals at home or work'],
                            ['text' => 'I regularly use conventional cleaning chemicals, disinfectants, hand sanitizers, air fresheners, scented candles, or other scented products at home or work'],
                            ['text' => 'I live in an agricultural area or often been exposed to herbicides, pesticides, fungicides at home, work, parks & golf courses, or roadsides'],
                            ['text' => 'I live or work adjacent to a highway, factory, incinerator, gas station, power plant, or other industrial pollution source?'],
                            ['text' => 'I live near a cell phone tower, high-voltage power lines, or other known source of electromagnetic radiation'],
                            ['text' => 'I am highly sensitive to smoke, perfumes, fragrances, cleaning products, gasoline, or other fumes'],
                            ['text' => 'I have had root canals, tooth extractions, “silver” fillings, crowns, dental sealants, dentures, retainers, aligning trays, braces, mouth guards, dental implants, etc'],
                            ['text' => 'I have a history of heavy use of alcohol or recreational or prescription drugs'],
                            ['text' => 'Other', 'order' => 1],
                        ],
                    ], [
                        'randomize_possible_answers' => false,
                        'required' => true,
                        'text' => 'My occupation is',
                        'type' => 'free_text',
                        'possibleAnswers' => [
                            ['text' => null],
                        ],
                    ],
                ],
            ],
            // Section #5
            [
                'title' => 'Symptoms Checklist',
                'description' => null,
                'slug' => 'symptoms_checklist',
                'order' => 4,
                'questions' => [
                    [
                        'randomize_possible_answers' => true,
                        'required' => false,
                        'text' => 'Energy / Mood / Stress',
                        'type' => 'multiselect',
                        'possibleAnswers' => [
                            ['text' => 'Worry and feel anxious'],
                            ['text' => 'Irritated and annoyed easily'],
                            ['text' => 'Sad an unmotivated to connect with others'],
                            ['text' => 'Variable mood or mood swings'],
                            ['text' => 'Low mood not as happy as I want to be'],
                            ['text' => 'Exhausted most of the time'],
                            ['text' => 'Wake up in the middle of the night and have trouble going back to sleep'],
                            ['text' => 'Trouble falling asleep'],
                            ['text' => 'Easily distracted and have trouble focusing'],
                            ['text' => 'My memory is fading'],
                            ['text' => 'Brain fog'],
                            ['text' => 'My mind races with nervous energy'],
                            ['text' => 'Difficult time making decisions'],
                            ['text' => 'Low willpower / motivation'],
                            ['text' => 'Quick to anger'],
                            ['text' => 'Hard time finishing tasks'],
                            ['text' => 'Low libido'],
                            ['text' => 'None of the above'],
                            ['text' => 'Other', 'order' => 1],
                        ],
                    ], [
                        'randomize_possible_answers' => true,
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
                    ], [
                        'randomize_possible_answers' => true,
                        'required' => false,
                        'text' => 'Digestion',
                        'type' => 'multiselect',
                        'possibleAnswers' => [
                            ['text' => 'Nausea'],
                            ['text' => 'Diarrhea'],
                            ['text' => 'Less than one bowel movement a day'],
                            ['text' => 'Can’t fully empty bowels'],
                            ['text' => 'Bloating'],
                            ['text' => 'Excessive gas'],
                            ['text' => 'Intestinal pain'],
                            ['text' => 'Feel full long after eating'],
                            ['text' => 'Food allergies or sensitivities'],
                            ['text' => 'Acid reflex or heartburn'],
                            ['text' => 'Gag response'],
                            ['text' => 'None of the above'],
                            ['text' => 'Other', 'order' => 1],
                        ],
                    ], [
                        'randomize_possible_answers' => true,
                        'required' => false,
                        'text' => 'Head',
                        'type' => 'multiselect',
                        'possibleAnswers' => [
                            ['text' => 'Headaches'],
                            ['text' => 'Faintness'],
                            ['text' => 'Dizziness'],
                            ['text' => 'Insomnia'],
                            ['text' => 'Watery or itchy eyes'],
                            ['text' => 'Bags or dark circles under eyes'],
                            ['text' => 'Blurred or tunnel vision'],
                            ['text' => 'Night blindness'],
                            ['text' => 'Ear infections'],
                            ['text' => 'Ringing in the ears, hearing loss'],
                            ['text' => 'Stuffy nose / sinus problems'],
                            ['text' => 'Excessive sneezing'],
                            ['text' => 'Excessive mucus in nose'],
                            ['text' => 'Swollen or discolored tongue, gums, or lips'],
                            ['text' => 'Chronic coughing'],
                            ['text' => 'None of the above'],
                            ['text' => 'Other', 'order' => 1],
                        ],
                    ], [
                        'randomize_possible_answers' => true,
                        'required' => false,
                        'text' => 'Skin',
                        'type' => 'multiselect',
                        'possibleAnswers' => [
                            ['text' => 'Acne'],
                            ['text' => 'Hives or rashes'],
                            ['text' => 'Constant dry skin'],
                            ['text' => 'Oily skin'],
                            ['text' => 'Facial hair growth'],
                            ['text' => 'Hair loss'],
                            ['text' => 'Excessive sweaty'],
                            ['text' => 'Very salty sweat'],
                            ['text' => 'Hot flashes'],
                            ['text' => 'Yellowish pigmentation'],
                            ['text' => 'Psoriasis'],
                            ['text' => 'Eczema'],
                            ['text' => 'Bumps on back of arms'],
                            ['text' => 'Impaired wound healing'],
                            ['text' => 'None of the above'],
                            ['text' => 'Other', 'order' => 1],
                        ],
                    ], [
                        'randomize_possible_answers' => true,
                        'required' => false,
                        'text' => 'Heart and Lungs',
                        'type' => 'multiselect',
                        'possibleAnswers' => [
                            ['text' => 'Chest pain'],
                            ['text' => 'Chest congestions'],
                            ['text' => 'Rapid heartbeat'],
                            ['text' => 'Irregular heartbeat'],
                            ['text' => 'Asthma'],
                            ['text' => 'Difficulty breathing'],
                            ['text' => 'None of the above'],
                            ['text' => 'Other', 'order' => 1],
                        ],
                    ], [
                        'randomize_possible_answers' => true,
                        'required' => false,
                        'text' => 'Other',
                        'type' => 'multiselect',
                        'possibleAnswers' => [
                            ['text' => 'Joint or muscle pain'],
                            ['text' => 'When I get sick it takes me a while to recover'],
                            ['text' => 'Ongoing or repeated infections'],
                            ['text' => 'Extremely salty sweat'],
                            ['text' => 'I constantly have cold hands and feet'],
                            ['text' => 'None of the above'],
                            ['text' => 'Other', 'order' => 1],
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
