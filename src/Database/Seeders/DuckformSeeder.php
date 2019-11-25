<?php

namespace TPenaranda\Duckform\Database\Seeders;

use Illuminate\Database\Seeder;
use TPenaranda\Duckform\Facade\Duckform;
use TPenaranda\Duckform\Models\{Form, PossibleAnswer, Question, Section};

class DuckformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formData = include(__DIR__ . '/FormExamples/patient-intake-questionnaire.php');

        if ($form = Form::whereSlug($formData['slug'])->first()) {
            if (!$this->command->confirmToProceed('Looks like this sample questionnaire was already seeded. Do you want to re-initialize data?', true)) {
                return false;
            }
            $form->forceDelete();
        }

        $form = Duckform::factory(Form::class)->create([
            'slug' => $formData['slug'],
            'title' => $formData['title'],
            'description' => $formData['description'],
        ]);

        foreach ($formData['sections'] as $sectionData) {
            $section = Duckform::factory(Section::class)->create(array_merge(
                ['form_id' => $form->id],
                array_only($sectionData, ['description', 'order', 'slug', 'title'])
            ));

            foreach ($sectionData['questions'] as $questionData) {
                $question = Duckform::factory(Question::class)->create(array_merge(
                    ['section_id' => $section->id],
                    array_only($questionData, ['randomize_possible_answers', 'required', 'text', 'type'])
                ));

                foreach ($questionData['possibleAnswers'] as $possibleAnswerData) {
                    Duckform::factory(PossibleAnswer::class)->create(array_merge(
                        ['question_id' => $question->id],
                        array_only($possibleAnswerData, ['text', 'order'])
                    ));
                }
            }
        }

        $this->command->getOutput()->writeln('<info>Duckform example form seeded! GET this form at any of the following endpoints:</info>');
        $this->command->getOutput()->writeln("<info>By ID:</info> /api/duckforms/{$form->id}");
        $this->command->getOutput()->writeln("<info>By slug:</info> /api/duckforms/{$form->slug}");
        $this->command->getOutput()->writeln("<info>By Token:</info> /api/duckforms/{$form->getToken()}");
    }
}
