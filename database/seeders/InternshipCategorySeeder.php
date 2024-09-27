<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Internship;
use Illuminate\Support\Facades\DB;

class InternshipCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'OTHERS',
            'GRAPHICS DESIGN',
            'INFORMATION TECHNOLOGY',
            'SALES AND BUSINESS DEVELOPMENT',
            'CONTENT WRITING',
            'HUMAN RESOURCES',
            'DIGITAL MARKETING',
            'FINANCE',
            'BUSINESS OPERATIONS',
            'HOSPITALITY',
            'MARKETING & ADVERTISING',
            'CARGO & FREIGHT',
            'PHOTOGRAPHY AND VIDEOGRAPHY',
            'LOGISTICS & DELIVERY',
            'COPY WRITER',
            'MOBILE APP DEVELOPMENT',
            'QUALITY ASSURANCE',
            'EVENT MANAGEMENT',
            'TRAVEL AND TOURISM MANAGEMENT',
            'JOURNALISM',
            'NGO/INGO/SOCIAL WORK',
            'ARTIFICIAL INTELLIGENCE',
            'WORK SHOP',

        ];

    //     foreach ($internships as $internship) {
    //         DB::table('internships')->insert($internship);
    //     }
    // }
}
