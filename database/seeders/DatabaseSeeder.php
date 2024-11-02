<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            "name" => "Alice",
            "email" => "alice@gmail.com",
            "role_id" => 1,
        ]);
        User::factory()->create([
            "name" => "Bob",
            "email" => "bob@gmail.com",
            "role_id" => 2,
        ]);
        User::factory()->create([
            "name" => "John",
            "email" => "john@gmail.com",
        ]);

        $list = ['Earth', 'Ocean', 'Foods', 'English', 'Coding', 'Maths', 'Health', 'Recycling', 'General Knowledge'];
        foreach ($list as $name) {
            \App\Models\Category::factory()->create(['name' => $name]);
        }
        $questions = [
            [
                'question' => 'What is the Earth\'s core primarily made of?',
                'options' => ['Nickel and iron', 'Carbon', 'Magnesium', 'Gold'],
                'correct_answer' => 0,
                'category_id' => 1,
            ],
            [
                'question' => 'What percentage of the Earth\'s surface is covered by water?',
                'options' => ['50%', '71%', '90%', '53%'],
                'correct_answer' => 1,
                'category_id' => 1,
            ],
            [
                'question' => 'Which layer of Earth\'s atmosphere contains the ozone layer?',
                'options' => ['Troposphere', 'Stratosphere', 'Mesosphere', 'Thermosphere'],
                'correct_answer' => 1,
                'category_id' => 1,
            ],
            [
                'question' => 'What is the largest ocean on Earth?',
                'options' => ['Atlantic Ocean', 'Pacific Ocean', 'Indian Ocean', 'Arctic Ocean'],
                'correct_answer' => 1,
                'category_id' => 2,
            ],
            [
                'question' => 'What is the name of the underwater mountain range in the Atlantic Ocean?',
                'options' => ['Mariana Trench', 'Mid-Atlantic Ridge', 'Great Barrier Reef', 'East Pacific Rise'],
                'correct_answer' => 1,
                'category_id' => 2,
            ],
            [
                'question' => 'What vitamin is abundant in citrus fruits?',
                'options' => ['Vitamin A', 'Vitamin B', 'Vitamin C', 'Vitamin D'],
                'correct_answer' => 2,
                'category_id' => 3,
            ],
            [
                'question' => 'Which mineral is most essential for bone health?',
                'options' => ['Iron', 'Calcium', 'Potassium', 'Zinc'],
                'correct_answer' => 1,
                'category_id' => 3,
            ],
            [
                'question' => 'Which food is known as the “king of fruits”?',
                'options' => ['Apple', 'Pineapple', 'Orange', 'Mango'],
                'correct_answer' => 3,
                'category_id' => 3,
            ],
            [
                'question' => 'What is the plural form of "sheep"?',
                'options' => ['Sheeps', 'Sheepes', 'Sheepy', 'Sheep'],
                'correct_answer' => 3,
                'category_id' => 4,
            ],
            [
                'question' => 'Which sentence is in the passive voice?',
                'options' => ['The cat chased the mouse.', ' The mouse was chased by the cat.', ' I am chasing the mouse.', 'Chase the mouse.'],
                'correct_answer' => 1,
                'category_id' => 4,
            ],
            [
                'question' => 'Identify the adverb in the sentence: “She quickly finished her homework.”',
                'options' => ['She', 'Quickly', 'Homework', 'Finished'],
                'correct_answer' => 1,
                'category_id' => 4,
            ],
            [
                'question' => 'What does HTML stand for?',
                'options' => ['Hyper Text Main Language', 'Hyperlink Text Markup Language', 'Hyper Text Markup Language', 'Hyper Text Markup Language'],
                'correct_answer' => 2,
                'category_id' => 5,
            ],
            [
                'question' => 'What symbol is used for comments in CSS?',
                'options' => ['//', '/* */', '<!-- -->', ' #'],
                'correct_answer' => 1,
                'category_id' => 5,
            ],
            [
                'question' => 'Which programming language is used for creating Android apps?',
                'options' => ['Python', 'Java', 'Swift', 'PHP'],
                'correct_answer' => 1,
                'category_id' => 5,
            ],
            [
                'question' => 'What does “CSS” stand for?',
                'options' => ['Cascading Style Sheets', 'Central Style Sheet', 'Colorful Style Sheet', 'Common Style Sheet'],
                'correct_answer' => 0,
                'category_id' => 5,
            ],
            [
                'question' => 'What is 7 x 8?',
                'options' => ['54', '56', '58', '58'],
                'correct_answer' => 1,
                'category_id' => 6,
            ],
            [
                'question' => 'What is 45% of 200?',
                'options' => ['90', '85', '100', '75'],
                'correct_answer' => 0,
                'category_id' => 6,
            ],
            [
                'question' => 'What is the formula for the area of a circle?',
                'options' => ['πr²', '2πr', 'πd', 'r²/π'],
                'correct_answer' => 0,
                'category_id' => 6,
            ],
            [
                'question' => 'What nutrient is primarily found in meat and beans?',
                'options' => ['Carbohydrates', 'Protein', 'Vitamins', 'Fats'],
                'correct_answer' => 1,
                'category_id' => 7,
            ],
            [
                'question' => 'Which organ is responsible for filtering blood?',
                'options' => ['Heart', 'Liver', 'Kidney', 'Lung'],
                'correct_answer' => 2,
                'category_id' => 7,
            ],
            [
                'question' => 'How many hours of sleep are recommended for adults?',
                'options' => ['4-5 hours', '5-6 hours', '7-8 hours', '9-10 hours'],
                'correct_answer' => 2,
                'category_id' => 7,
            ],
            [
                'question' => 'Which material is commonly recycled and can be turned into new paper products?',
                'options' => ['Plastic', 'Paper', 'Glass', 'Metal'],
                'correct_answer' => 1,
                'category_id' => 8,
            ],
            [
                'question' => 'What color bin is usually used for recycling paper?',
                'options' => ['Green', 'Black', 'Yellow', 'Blue'],
                'correct_answer' => 3,
                'category_id' => 8,
            ],
            [
                'question' => 'Which of the following can be recycled?',
                'options' => ['Aluminum cans', 'Food waste', 'Styrofoam', 'Plastic bags (in curbside bins)'],
                'correct_answer' => 0,
                'category_id' => 8,
            ],
            [
                'question' => 'What is the tallest animal in the world?',
                'options' => ['Elephant', 'Giraffe', 'Elephant', 'Lion'],
                'correct_answer' => 1,
                'category_id' => 9,
            ],
            [
                'question' => 'Which planet is closest to the sun?',
                'options' => ['Venus', 'Earth', 'Mercury', 'Mars'],
                'correct_answer' => 2,
                'category_id' => 9,
            ],
            [
                'question' => 'What is the largest country by area?',
                'options' => ['Canada', 'China', 'Russia', 'USA'],
                'correct_answer' => 2,
                'category_id' => 9,
            ],
        ];
        foreach($questions as $item) {
            \App\Models\Quiz::factory()->create([
                'question' => $item['question'],
                'options' => json_encode($item['options']),
                'correct_answer' => $item['correct_answer'],
                'category_id' => $item['category_id'],
            ]);
        }
        $list = ['Admin', 'Manager', 'User'];
        foreach ($list as $name) {
            \App\Models\Role::factory()->create(['name' => $name]);
        }
    }
}
