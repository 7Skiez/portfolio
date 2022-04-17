<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('projects')->delete();
        
        \DB::table('projects')->insert(array (
            0 => 
            array (
                'id' => 16,
                'title' => 'Est quam dolorum ea quas tempore delectus.',
                'description' => 'I was thinking I should think!\' (Dinah was the first to break the silence. \'What day of the officers: but the Rabbit asked. \'No, I give you fair warning,\' shouted the Queen. \'I haven\'t opened it yet,\' said the Mock Turtle. So she was peering about.',
                    'link' => 'http://www.ritchie.info/nisi-ab-dolorem-numquam-quibusdam-quis-dolor-natus-a',
                    'link_title' => 'Alice thought she.',
                    'technologies' => '[]',
                    'image' => 'projects/March2022/c6e85e96992d775cfd29372b148bb2c0.jpg',
                    'owner_id' => 2,
                    'order' => 27,
                    'active' => 0,
                    'featured' => 1,
                    'created_at' => '2022-03-14 14:22:52',
                    'updated_at' => '2022-04-17 10:56:17',
                ),
                1 => 
                array (
                    'id' => 17,
                    'title' => 'Eaque neque et vitae quisquam.',
                    'description' => 'Hatter. Alice felt so desperate that she began again. \'I should think you can find them.\' As she said this, she was in the pool of tears which she found her way into a conversation. Alice replied, so eagerly that the Mouse had changed his mind, and was.',
                    'link' => 'https://www.mitchell.info/expedita-dolor-ullam-earum-aut-velit',
                    'link_title' => 'And she\'s such a.',
                    'technologies' => '[]',
                    'image' => 'projects/March2022/aadd12a8f563b58c09fcd9dced60e0d7.jpg',
                    'owner_id' => 2,
                    'order' => 23,
                    'active' => 0,
                    'featured' => 1,
                    'created_at' => '2022-03-14 14:22:52',
                    'updated_at' => '2022-04-17 10:56:17',
                ),
                2 => 
                array (
                    'id' => 18,
                    'title' => 'Vitae beatae quae ex ea amet quibusdam.',
                    'description' => 'I\'d been the whiting,\' said Alice, who was trembling down to look through into the darkness as hard as she could for sneezing. There was a child,\' said the Hatter, and here the Mock Turtle, who looked at her, and said, without opening its eyes, \'Of.',
                    'link' => 'http://www.robel.com/',
                    'link_title' => 'And she thought it.',
                    'technologies' => '[]',
                    'image' => 'projects/March2022/cb80947fea3973c3d054ff34bca4e01b.jpg',
                    'owner_id' => 2,
                    'order' => 32,
                    'active' => 1,
                    'featured' => 1,
                    'created_at' => '2022-03-14 14:22:52',
                    'updated_at' => '2022-04-17 10:56:40',
                ),
                3 => 
                array (
                    'id' => 19,
                    'title' => 'Eos est quibusdam rerum sit.',
                    'description' => 'I\'ve tried banks, and I\'ve tried banks, and I\'ve tried banks, and I\'ve tried banks, and I\'ve tried to fancy what the moral of that is--"Birds of a muchness?\' \'Really, now you ask me,\' said Alice, who always took a great many more than nine feet high.',
                    'link' => 'http://wisozk.com/corporis-nemo-repudiandae-recusandae',
                    'link_title' => 'I suppose Dinah\'ll.',
                    'technologies' => '[]',
                    'image' => 'projects/March2022/3e5560b26b628e032d146a74b14d8254.jpg',
                    'owner_id' => 2,
                    'order' => 31,
                    'active' => 0,
                    'featured' => 1,
                    'created_at' => '2022-03-14 14:22:52',
                    'updated_at' => '2022-04-17 10:56:40',
                ),
            ));
        
        
    }
}