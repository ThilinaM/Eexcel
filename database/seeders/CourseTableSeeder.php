<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $cources = [
            [
                'id'             => 1,
                'name'           => 'Advanced Spoken English',
                'description' => '<p> Contains more than 300 conversations in real life situations</p>
                <p>	Lessons covering practical usages of the English language from elementary level to advanced level</p>
                <p>	Enbles you to improve your conversational skills upto a near native speaker level </p>
                <p>	Hundreds of sentence patterns, phrases, idioms, expressions used by native speakers in day to day conversations</p>
                <p>	Thousands of words used by native speakers in day to day communication.</p>
                <p>	Advanced grammer to be used to make profound expressions.</p>
                <p>	Enhances your knowledge upto a high proficiency level enabling you to communicate effectively in a wider scale of social interactions.</p>
               <br/>
<p>එදිනෙදා ප්‍රයෝගික සමාජ ව්‍යවහාරයන් අන්තර්ගත සංවාද 300 කට අධිකයි.</p>
<p>මුලික භාෂා භාවිතයන්ගේ සිට උසස් සමාජීය භාවිතයන් ආවරණය වන සංවාද</p>
<p>ඉංග්‍රීසි මව් භාෂාව ලෙස කතා කරන්නන් භාවිතා කරන භාෂා ශෛලයට ආසන්න ලෙස ඔබේ කථන හැකියාවන් වර්ධනයට උපකාරී වෙයි.</p>
<p>ස්වභාවික ඉංග්‍රීසි කථනයේ භාවිතා වන sentence patterns, phrases, idioms, expressions සිය ගණනක්.</p>
<p>ස්වභාවික ඉංග්‍රීසි කතා කරන්නන් එදිනෙදා භාවිතා කරන  වචන දහස් ගණනක්</p>
<p>වඩාත් ව්‍යක්ත ගැඹුරු අදහස් ප්‍රකාශ කිරීම සදහා ඉවහල් වන උසස් ව්‍යාකරණ රටාවන්</p>
<p>ඔබ‍ට මෙතෙක් නිරවුල්ව අදහස් ප්‍රකාශ කිරීමට නොහැකිව තිබු බොහෝ පරාසයක පැහැදිලිව අදහස් ප්‍රකාශ කිරීමේ හැකියාව වර්ධනය.</p>
<p>ඔබේ ඉංග්‍රීසි භාෂා හැකියාවන් ඉතා ඉහල මට්ටමකට නංවන මේ වටිනා දැනුම් සම්භාරය ඇත කර ගැනීමට ඔබ යෙදිය යුත්තේ දිනපතා ඔබේ කාලයෙන් විනාඩි 20 -30 ක්‌ පමණයි.</p>',
                'status' => 'Active',
                'price' => 'For just 950 /=',                
                'link_text' => 'click to get 5 free lessons',
                'link' => '/login',
            ],
            [
                'id'             => 2,
                'name'           => 'Basic Spoken english with essential grammer (අත්‍යවශ්‍ය ව්‍යාකරණ සමග මුලික ඉංග්‍රීසි කතාව)',
                'description' => '<p>This course which contains more than 200 lessons has been designed for basic learners to gain fluency in simple day to day conversations. This is not a mere grammar course. This basically offers simple conversational english in day to day life with a special guide to essential grammar.</p>
                <br>
<p>Covers all essential grammar</p>
<p>How to utilize grammatical knowledge in practicle usage</p>
<p>Building up sentances more meaningful</p>
<p>Hundreds of words used in day to day conversations</p>
<p>Hundreds of other sentence patterns, phrases, expressions, idioms</p>
<p>More than 150 conversations covering a range of day to day  events</p>
<p>Gives you the knowledge of conversational English enabling you to carry out daily life conversations effectively.</p>

<br>
<p>ආරම්භකයින් සදහා නිර්මාණය කර ඇති මෙම දින 200 පාඩම් මාලාව හුදු ව්‍යාකරණ පටමලාවක් නොවන අතර අවශ්‍ය ව්‍යාකරණ දැනුමද සමග එදිනෙදා සරල සංවාදයන් නොපැකිලව ගෙන යාමට අවශ්‍ය දැනුම ලබා දෙන සංවාද රාශියකින් සමන්විතයි. එය ප්‍රධාන වශයෙන් සරල එදිනෙදා ඉංග්‍රීසි කථනය මැනවින් හුරු කරවීම සදහා නිර්මිතයි.</p>
<br/>
<p>සියලු අත්‍යවශ්‍ය ව්‍යාකරණ</p>
<p>ව්‍යාකරණ දැනුම නිසි පරිදි ප්‍රයෝගික ව්‍යහාරයේ යෙදවීම</p>
<p>වඩාත් නිරවුල්ව අර්ථාන්විතව වාක්‍ය ගොඩ නැගීම</p>
<p>ප්‍රයෝගික ව්‍යවහාරයේ නිතර භාවිතා වන අත්‍යවශ්‍යම වචන සිය ගණනක් </p>
<p>වාක්‍ය රටා, වාක්‍ය ඛණ්ඩ, ඉඟි වැකි, විවිධ ප්‍රකාශන තවත් සිය ගණනක්.</p>
<p>එදිනෙදා ජිවිතයට අත්‍යවශ්‍ය කතා සංවාද 100කට අධිකයි.</p>
<p>නිරවුල්ව නොපැකිලව එදිනෙදා සංවාද පවත්වා ගෙන යාමට අවශ්‍ය දැනුම සහ හැකියාව නියත ලෙස වර්ධනය කරවයි</p>
<p>දිනකට විනාඩි 30 ක පරිශීලනයෙන් දින 200 කදී ඔබ‍ට කදිම ලෙස එදිනෙදා ඉංග්‍රීසි සංවාද හැසිරවීමේ හැකියාව ලබා ගත හැකියි.</p>
                ',
                'status' => 'Active',
                'price' => 'For just 950 /=',
                'link_text' => 'click to get 5 free lessons',
                'link' => '/login',
            ],
        ];

        Course::insert($cources);
    }
}
