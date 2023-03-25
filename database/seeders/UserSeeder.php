<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = DB::table('users')->pluck('id');
        $role = Role::findByName('user');
        
        foreach ($users as $user) {
            $user = User::find($user);
            $user->assignRole($role);
        }

        if (DB::getSchemaBuilder()->hasColumn('users', 'department_id')) {
            // create users
        } else {
            // column doesn't exist, skip creating users
        }

        DB::statement('SET SESSION sql_mode = "NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION"');

        // Remove non-numeric characters from phone numbers
        $users = DB::table('users')->get();
        foreach ($users as $user) {
            $user->phone = preg_replace('/[^0-9]/', '', $user->phone);

            // Replace spaces in phone number and add plus sign if necessary
            $phone = Str::replaceArray(' ', ['', '-', '.'], $user->phone);
            $phone = Str::startsWith($phone, '+') ? $phone : '+' . $phone;

            DB::table('users')->where('id', $user->id)->update(['phone' => $phone]);
        }
  

        DB::table('users')->insert([
            // PRODUCTION ========================================
            ['name' => 'Jason "JD" Danter', 'title' => 'Production Manager', 'email' => 'jmdanter@mac.com', 'phone' => '1-816-646-8665', 'dept' => 'production', 'department_id' => 1],
            ['name' => 'Carmen Rodriguez', 'title' => 'Production Coordinator', 'email' => 'crmsall@aol.com', 'phone' => '1-305-588-5046', 'dept' => 'production', 'department_id' => 1],
            ['name' => 'Emma Cederblad', 'title' => 'Production Coordinator', 'email' => 'emmacederblad@gmail.com', 'phone' => '1-615-955-2044', 'dept' => 'production', 'department_id' => 1],
            ['name' => 'Holly Sandeman', 'title' => 'Production Coordinator', 'email' => 'hollysandeman@me.com', 'phone' => '+44 7515 262 519', 'dept' => 'production', 'department_id' => 1],
            ['name' => 'Dylan Kennedy', 'title' => 'Production Accountant', 'email' => 'dylan.kennedy1@outlook.com', 'phone' => '1-516-524-6747', 'dept' => 'production', 'department_id' => 1],
            ['name' => 'Kane McGee', 'title' => 'Production Accountant', 'email' => 'kane@mcgeemanagement.com', 'phone' => '1-813-300-0538', 'dept' => 'production', 'department_id' => 1],
            ['name' => 'Brian Wares', 'title' => 'Logistic Stage Manager', 'email' => 'bwares@mac.com', 'phone' => '+44 7974 351 766', 'dept' => 'production', 'department_id' => 1],
            ['name' => 'Brad Imrie', 'title' => 'Technical Stage Manager', 'email' => 'bradfordimrie@mac.com', 'phone' => '+44 7905 353 444', 'dept' => 'production', 'department_id' => 1],
            ['name' => 'Seanne Farmer', 'title' => 'Show Director', 'email' => 'seannefarmer@thefarmoryinc.com', 'phone' => '1-213-944-2584', 'dept' => 'production', 'department_id' => 1],
            ['name' => 'Vicki Shenk', 'title' => 'Show Caller Sub', 'email' => 'vickis@thefarmoryinc.com', 'phone' => '1-702-809-2688', 'dept' => 'production', 'department_id' => 1],
            // misc ==============================================
            ['name' => 'Kyle Bricker', 'title' => 'Fan Tech', 'email' => 'kylebricker1@gmail.com', 'phone' => '1-630-961-2587', 'dept' => 'misc', 'department_id' => 2],
            ['name' => 'Carrick Lloyd', 'title' => 'IT Tech', 'email' => 'carrick.lloyd99@icloud.com', 'phone' => '1-859-948-3909', 'dept' => 'misc', 'department_id' => 2],
            // dressing_room  ====================================
            ['name' => 'Jennifer Jones', 'title' => 'DR/Ambiance', 'email' => 'bennied404@gmail.com', 'phone' => '1-615-479-1148', 'dept' => 'dressing_room', 'department_id' => 3],
            ['name' => 'Lane Zoerhof', 'title' => 'Ambiance', 'email' => 'ljzoer@gmail.com', 'phone' => '1-310-736-0593', 'dept' => 'dressing_room', 'department_id' => 3],
            ['name' => 'Shane Oster', 'title' => 'Ambiance', 'email' => 'shane_oster@yahoo.com', 'phone' => '1-717-634-6907', 'dept' => 'dressing_room', 'department_id' => 3],
            ['name' => 'James "Ash" Ashman', 'title' => 'Ambiance', 'email' => 'jam_ash@hotmail.com', 'phone' => '+43 664 9957 1961', 'dept' => 'dressing_room', 'department_id' => 3],
            ['name' => 'Amy Moore', 'title' => 'DR/Catering Coordinator', 'email' => 'amymoore247@gmail.com', 'phone' => '+33 7455 53862', 'dept' => 'dressing_room', 'department_id' => 3],
            // POWER =============================================
            ['name' => 'Matt Murphy', 'title' => 'Crew Chief', 'email' => 'mjmmurphy@btinternet.com', 'phone' => '44 7809877509', 'dept' => 'power', 'department_id' => 4],
            ['name' => 'Dave Lesh', 'title' => 'Electrician', 'email' => 'squadoogle13@gmail.com', 'phone' => '44 7482990939', 'dept' => 'power', 'department_id' => 4],
            ['name' => 'Paul Appleby', 'title' => 'Genny Tech', 'email' => 'paulappleby79@hotmail.co.uk', 'phone' => '44 7429708134', 'dept' => 'power', 'department_id' => 4],
            ['name' => 'Jack Murray', 'title' => 'Electrician', 'email' => 'jackmurray049@gmail.com', 'phone' => '44 7921515844', 'dept' => 'power', 'department_id' => 4],
            // BACKLINE ==========================================
            ['name' => 'Sean Woods', 'title' => 'Drum Tech', 'email' => 'sa_wood2@yahoo.com', 'phone' => '1-646-725-0020', 'dept' => 'backline', 'department_id' => 5],
            ['name' => 'Kevin "Kwiz" Ryan', 'title' => 'Playback Engineer', 'email' => 'kwiztronic@me.com', 'phone' => '1-917-531-8218', 'dept' => 'backline', 'department_id' => 5],
            ['name' => 'Sean O\'Brien', 'title' => 'Guitar/Bass Tech', 'email' => 'sonitek4@gmail.com', 'phone' => '1-410-761-0164', 'dept' => 'backline', 'department_id' => 5],
            ['name' => 'Zach Baird', 'title' => 'Keyboard Tech', 'email' => 'zacharybaird@mac.com', 'phone' => '1-512-589-7649', 'dept' => 'backline', 'department_id' => 5],
            // AUDIO =============================================
            ['name' => 'James Berry', 'title' => 'FOH Engineer', 'email' => 'jabco2@me.com', 'phone' => '1-832-512-9867', 'dept' => 'audio', 'department_id' => 6],
            ['name' => 'Jimmy Corbin', 'title' => 'Monitor Engineer', 'email' => 'defguysaudio@yahoo.com', 'phone' => '1-401-965-1154', 'dept' => 'audio', 'department_id' => 6],
            ['name' => 'Chris Bellamy', 'title' => 'Band MON Engineer', 'email' => 'christopherbellamy88@gmail.com', 'phone' => '1-303-619-8915', 'dept' => 'audio', 'department_id' => 6],
            ['name' => 'Mark Brnich', 'title' => 'System Eng - Crew Chief', 'email' => 'markb8th@splitbolt.com', 'phone' => '1-440-915-4740', 'dept' => 'audio', 'department_id' => 6],
            ['name' => 'Krysten Dean', 'title' => 'System Eng. #2 / A Tech', 'email' => 'krystend@8thdaysound.com', 'phone' => '1-267-978-5761', 'dept' => 'audio', 'department_id' => 6],
            ['name' => 'John Switzer', 'title' => 'Mon Tech #1', 'email' => 'johnswitzer2000@yahoo.com', 'phone' => '1-615-260-5067', 'dept' => 'audio', 'department_id' => 6],
            ['name' => 'Lee Fox-Furnell', 'title' => 'Mon Tech #2', 'email' => 'lee.furnell@gmail.com', 'phone' => '+44 791 773 1787', 'dept' => 'audio', 'department_id' => 6],
            ['name' => 'Erick Ruiz', 'title' => 'RF Tech #1', 'email' => 'ruizerick@me.com', 'phone' => '1-832-603-1734', 'dept' => 'audio', 'department_id' => 6],
            ['name' => 'Clint Reynolds', 'title' => 'RF Tech #2', 'email' => 'clinton_reynolds04@yahoo.com', 'phone' => '1-303-619-8915', 'dept' => 'audio', 'department_id' => 6],
            ['name' => 'Patrick Taghavi', 'title' => 'Show Com Tech #1', 'email' => 'patrick.taghavi@gmail.com', 'phone' => '+33 616 1851 61', 'dept' => 'audio', 'department_id' => 6],
            ['name' => 'Elmar Dizon', 'title' => 'Show Com Tech #2', 'email' => 'emosounds@hotmail.com', 'phone' => '1-321-279-4680', 'dept' => 'audio', 'department_id' => 6],
            ['name' => 'Ashley Lowe', 'title' => 'PA Tech #1', 'email' => 'A.lowe@8thdaysound.com', 'phone' => '+61 402 684 013', 'dept' => 'audio', 'department_id' => 6],
            ['name' => 'Chris Jacobs', 'title' => 'PA Tech #2', 'email' => 'cjacobs@clairglobal.com', 'phone' => '1-513-608-2428', 'dept' => 'audio', 'department_id' => 6],
            ['name' => 'Jessica Scott', 'title' => 'PA Tech #3', 'email' => 'jscott@8thdaysound.com', 'phone' => '1-305-607-0631', 'dept' => 'audio', 'department_id' => 6],
            ['name' => 'Malcolm Secright', 'title' => 'PA Tech #4', 'email' => 'Secright105@gmail.com', 'phone' => '1-253-754-8849', 'dept' => 'audio', 'department_id' => 6],
            ['name' => 'Tanner Kinney', 'title' => 'Vocal Sound Effects Engneer', 'email' => 'tanner@tannerkinney.com', 'phone' => '1-434-944-6821', 'dept' => 'audio', 'department_id' => 6],
            ['name' => 'Demetrius Henry', 'title' => 'Digital Programmer', 'email' => 'deme@digitalzero.com', 'phone' => '1-323-309-5355', 'dept' => 'audio', 'department_id' => 6],
            // WARDROBE ==========================================
            ['name' => 'Timothy White', 'title' => 'Master Tailor', 'email' => 'trytim1@gmail.com', 'phone' => '1-310-254-8515', 'dept' => 'wardrobe', 'department_id' => 7],
            ['name' => 'Ryan Dobson', 'title' => 'B. Dresser / Crew Chief', 'email' => 'ryan@parkwood-ent.com', 'phone' => '1-917-573-8618', 'dept' => 'wardrobe', 'department_id' => 7],
            ['name' => 'Kanna Taniuchi', 'title' => 'Wardrobe', 'email' => 'kannataniuchi@gmail.com', 'phone' => '1-919-749-9118', 'dept' => 'wardrobe', 'department_id' => 7],
            ['name' => 'Su Flesland-Carter', 'title' => 'Wardrobe', 'email' => 'SuEMpls@aol.com', 'phone' => '1-612-743-4522', 'dept' => 'wardrobe', 'department_id' => 7],
            ['name' => 'Georgina Curtis', 'title' => 'Wardrobe', 'email' => 'georginacurtis9@gmail.com', 'phone' => '1-805-791-1794', 'dept' => 'wardrobe', 'department_id' => 7],
            // SECUIRTY ==========================================
            ['name' => 'Kenny Gabriel', 'title' => 'Venue Security - Lead', 'email' => 'kenny@deboerglobal.com', 'phone' => '1-310-770-8960', 'dept' => 'security', 'department_id' => 8],
            ['name' => 'Joe Little', 'title' => 'Venue Security', 'email' => 'joe@deboerglobal.com', 'phone' => '1-818-217-7607', 'dept' => 'security', 'department_id' => 8],
            // RIGGING ===========================================
            ['name' => 'Bill Rengstl', 'title' => 'Head Rigger', 'email' => 'deadhang@aol.com', 'phone' => '1-561-704-6372', 'dept' => 'rigging', 'department_id' => 9],
            ['name' => 'Jason "Lewlew" Lewis', 'title' => 'Rigger', 'email' => 'lewlewtrp@gmail.com', 'phone' => '1 323 983 3200', 'dept' => 'rigging', 'department_id' => 9],
            ['name' => 'Alex Bolduc', 'title' => 'Rigger', 'email' => 'bolducalex@hotmail.com', 'phone' => '1-267-699-8323', 'dept' => 'rigging', 'department_id' => 9],
            ['name' => 'Alexis "Lex" Roccos', 'title' => 'Climber Carp 1', 'email' => 'alex.roccos@gmail.com', 'phone' => '1-614-679-5551', 'dept' => 'rigging', 'department_id' => 9],
            ['name' => 'Evan Klemmt', 'title' => 'Climber Carp 2', 'email' => 'evanklemmt@gmail.com', 'phone' => '1-904-894-1221', 'dept' => 'rigging', 'department_id' => 9],
            // CARPS_PROPS =======================================
            ['name' => 'Adam Cavanagh', 'title' => 'Head Carpenter', 'email' => 'adamhc@hotmail.co.uk', 'phone' => '+44 759 929 7545', 'dept' => 'carps_props', 'department_id' => 10],
            ['name' => 'RawD Van Egmond', 'title' => 'Ground Automation Supervisor', 'email' => 'Rodwiththetour@gmail.com', 'phone' => '1-214-470-0863', 'dept' => 'carps_props', 'department_id' => 10],
            ['name' => 'Stevie Norman', 'title' => 'Carpenter 3', 'email' => 'stephnorman@hotmail.com', 'phone' => '+44 7961 008 553', 'dept' => 'carps_props', 'department_id' => 10],
            ['name' => 'Karl Cavanagh', 'title' => 'Carpenter 4', 'email' => 'karlcavanagh@hotmail.com', 'phone' => '+44 798 027 3233', 'dept' => 'carps_props', 'department_id' => 10],
            ['name' => 'Ollie Wales', 'title' => 'Carpenter 5', 'email' => 'oliwales_11@hotmail.co.uk', 'phone' => '+44 7515 067 448', 'dept' => 'carps_props', 'department_id' => 10],
            ['name' => 'Corey Proulx', 'title' => 'Carpenter 6', 'email' => 'coreyproulx@gmail.com', 'phone' => '1-604-722-9336', 'dept' => 'carps_props', 'department_id' => 10],
            ['name' => 'Alex White', 'title' => 'Carpenter 7', 'email' => 'mr.pcaw@gmail.com', 'phone' => '+44 7538 813 241', 'dept' => 'carps_props', 'department_id' => 10],
            ['name' => 'Phil Davidson', 'title' => 'Carpenter 8', 'email' => 'phildavidson1976@gmail.com', 'phone' => '+44 7717 724 626', 'dept' => 'carps_props', 'department_id' => 10],
            ['name' => 'Eric Cardoza', 'title' => 'Carpenter 9', 'email' => 'eric_cardoza@live.com', 'phone' => '1 214 606 4338', 'dept' => 'carps_props', 'department_id' => 10],
            ['name' => 'Jake Van Egmond', 'title' => 'Carpenter 10', 'email' => 'jacobvanegmond77@gmail.com', 'phone' => '1 970 903 1364', 'dept' => 'carps_props', 'department_id' => 10],
            ['name' => 'Joshiah Thacker', 'title' => 'Carpenter 11', 'email' => 'thackerjosiah@gmail.com', 'phone' => '1-682-556-7645', 'dept' => 'carps_props', 'department_id' => 10],
            ['name' => 'Matt Fletcher', 'title' => 'Carpenter 12', 'email' => 'mfletcher1990@gmail.com', 'phone' => '+44 7518 347 040', 'dept' => 'carps_props', 'department_id' => 10],
            ['name' => 'Tracy Van Egmond', 'title' => 'Props', 'email' => 'tracyv7853@yahoo.com', 'phone' => '1 817 600 9208', 'dept' => 'carps_props', 'department_id' => 10],
            ['name' => 'Emma Reichard', 'title' => 'Props', 'email' => 'reichardemma@gmail.com', 'phone' => '1-609-475-2636', 'dept' => 'carps_props', 'department_id' => 10],
            ['name' => 'Tom Croft', 'title' => 'Props', 'email' => 'T.s.crofty@gmail.com', 'phone' => '+44 7557 445400', 'dept' => 'carps_props', 'department_id' => 10],
            // LIGHTING ==========================================
            ['name' => 'Ishai Mika', 'title' => 'Lighting Director', 'email' => 'ishai@greenwall.se', 'phone' => '+46 73-333 60 79', 'dept' => 'lighting', 'department_id' => 11],
            ['name' => 'James Jones III', 'title' => 'Lighting Crew Chief', 'email' => 'jjones.iii@outlook.com', 'phone' => '1 323 833 3774', 'dept' => 'lighting', 'department_id' => 11],
            ['name' => 'Mike Rothwell', 'title' => 'FOH / Network', 'email' => 'mike@mikerothwell.com', 'phone' => '+44 787 963 4241', 'dept' => 'lighting', 'department_id' => 11],
            ['name' => 'Tom Bider', 'title' => 'SR Dimmer', 'email' => 'tbider@prg.com', 'phone' => '1-702-218-4491', 'dept' => 'lighting', 'department_id' => 11],
            ['name' => 'Dom McClory', 'title' => 'SL Dimmer', 'email' => 'dom.mcclory@gmail.com', 'phone' => '+44 7816 140698', 'dept' => 'lighting', 'department_id' => 11],
            ['name' => 'Craig JR-Saunders', 'title' => 'LX Dimmer', 'email' => 'craigjr_saunders@yahoo.com', 'phone' => '+44 7967 672 371', 'dept' => 'lighting', 'department_id' => 11],
            ['name' => 'Chris Wilkes', 'title' => 'Lighting Tech', 'email' => 'wilkseyuk@yahoo.com', 'phone' => '+44  7816 132 863', 'dept' => 'lighting', 'department_id' => 11],
            ['name' => 'Javier Jaudenes', 'title' => 'Lighting Tech', 'email' => 'todosconelfuego@hotmail.com', 'phone' => '+34 692 541 919', 'dept' => 'lighting', 'department_id' => 11],
            ['name' => 'Tom Bennett', 'title' => 'Lighting Tech', 'email' => 'tom.bennett1986@me.com', 'phone' => '+44 7545 084 324', 'dept' => 'lighting', 'department_id' => 11],
            ['name' => 'Liam Wise', 'title' => 'Lighting Tech', 'email' => 'liamwisetech@gmail.com', 'phone' => '+44 7414 975 345', 'dept' => 'lighting', 'department_id' => 11],
            ['name' => 'Andie Szekely', 'title' => 'Lighting Tech', 'email' => 'andieszekely@gmail.com', 'phone' => '1-702-203-3512', 'dept' => 'lighting', 'department_id' => 11],
            ['name' => 'Matthew Arblaster', 'title' => 'Lighting Tech', 'email' => 'marblaster@live.co.uk', 'phone' => '+44 7980 003 159', 'dept' => 'lighting', 'department_id' => 11],
            ['name' => 'Adam Morris', 'title' => 'Lighting Tech', 'email' => 'adam@moonunitproductions.com', 'phone' => '+44 7826 252 702', 'dept' => 'lighting', 'department_id' => 11],
            ['name' => 'Lewis Willding', 'title' => 'Lighting Tech', 'email' => 'lewis.willding@gmail.com', 'phone' => '+44 7533 003 838', 'dept' => 'lighting', 'department_id' => 11],
            ['name' => 'Harrison Elmon May Jr', 'title' => 'Follow Me Tech', 'email' => 'elmonmay@gmail.com', 'phone' => '1-336-734-8323', 'dept' => 'lighting', 'department_id' => 11],
            ['name' => 'Sam Colcough', 'title' => 'Movecat', 'email' => 'sam_colclough@icloud.com', 'phone' => '+44 7880 354 926', 'dept' => 'lighting', 'department_id' => 11],
            ['name' => 'Serafin Gonzalez', 'title' => 'Lighting Tech', 'email' => 'serafingonzales@me.com', 'phone' => '1-805-216-8778', 'dept' => 'lighting', 'department_id' => 11],
            ['name' => 'Mark Butler', 'title' => 'Lighting Tech', 'email' => 'markbutler6@mac.com', 'phone' => '1 858 252 8578', 'dept' => 'lighting', 'department_id' => 11],
            ['name' => 'Mary Webb', 'title' => 'Lighting Tech', 'email' => 'marywebb_@hotmail.com', 'phone' => '+447831520648', 'dept' => 'lighting', 'department_id' => 11],
            ['name' => 'Cornelius O\'Grady', 'title' => 'Lighting Tech', 'email' => 'chad.derelict@gmail.com', 'phone' => '+44 7715 217 930', 'dept' => 'lighting', 'department_id' => 11],
            ['name' => 'Luke Cresswell', 'title' => 'Lighting Tech', 'email' => '', 'phone' => '', 'dept' => 'lighting', 'department_id' => 11],
            // VIDEO =============================================
            ['name' => 'James Merryman', 'title' => 'Video Director', 'email' => 'jbmerryman@me.com', 'phone' => '1-310-746-7260', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Sandra Palormi', 'title' => 'Asst Director- EU Dates', 'email' => 'sandra.palormi@me.com', 'phone' => '', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Hayley Collect', 'title' => 'Asst Director - LA/Paris REH', 'email' => 'hayleyrosecollett@mac.com', 'phone' => '', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Michelle Arnold', 'title' => 'Asst Director - US', 'email' => 'runtitles@gmail.com', 'phone' => '', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Brett Turnbull', 'title' => 'Director of Photography', 'email' => 'brettturnbull@me.com', 'phone' => '+44 7796 953 837', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Brandon Smith', 'title' => 'Vision Mixer', 'email' => 'brandon@amarkproductions.com', 'phone' => '1-409-790-7148', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Johanns Litzenberger', 'title' => 'Video Engineer', 'email' => 'johannslitz@gmail.com', 'phone' => '1-787-232-6552', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Julien Schneider', 'title' => 'Video Engineer', 'email' => 'Julien.schneider@mediatree.fr', 'phone' => '+33 652 529 160', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Jhonatan Hernandez', 'title' => 'CineCamera Tech / Video RF', 'email' => 'mayaimagery@gmail.com', 'phone' => '1-818-437-5271', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Emelie Scaminac', 'title' => 'Shader', 'email' => 'emelie.scaminaci@me.com', 'phone' => '32 476 673 642', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Frederic Van Geelkerken', 'title' => 'Shader', 'email' => 'frederic.vangeelkerken@videohouse.be', 'phone' => '32 472 361 910', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Jon Michael Schulmann', 'title' => 'Video Crew Chief', 'email' => 'jonmichaelschulman@gmail.com', 'phone' => '1-504-416-6410', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Brent Kirchner', 'title' => 'LED Tech', 'email' => 'bkirchner49@gmail.com', 'phone' => '1-747-203-4882', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Tyler Fields', 'title' => 'LED Tech', 'email' => 'tylerfield5@yahoo.com', 'phone' => '1-713-202-2253', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Jake Gardner', 'title' => 'LED Tech', 'email' => 'jakewgardner@gmail.com', 'phone' => '1-818-434-9571', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Matthew Ortiz', 'title' => 'LED Tech', 'email' => 'cruz.matthew72@yahoo.com', 'phone' => '1-818-818-3047', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Carla Vagland', 'title' => 'LED Tech', 'email' => 'carlavagland@gmail.com', 'phone' => '46 731 534 726', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Brenna Rae', 'title' => 'LED Tech', 'email' => 'brennarae2121@gmail.com', 'phone' => '1-305-458-5060', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Jared Odom', 'title' => 'LED Tech', 'email' => 'jaredjodom@gmail.com', 'phone' => '1-909-706-5403', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Brittany Daves', 'title' => 'LED Tech', 'email' => 'bdaves574@gmail.com', 'phone' => '1-336-840-6585', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'George McPeak', 'title' => 'LED Tech', 'email' => 'poconnely@gmail.com', 'phone' => '1-509-557-8716', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Karl Hansen', 'title' => 'LED/Video Camera', 'email' => 'karlhansen303@gmail.com', 'phone' => '1 818-521-5744', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Austin Wavra', 'title' => 'LED/Video Camera', 'email' => 'austinwavra@gmail.com', 'phone' => '1 818-914-9093', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Micah Wickre', 'title' => 'LED Tech', 'email' => 'micahwickre@gmail.com', 'phone' => '1-612-590-7618', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'James Lockhart', 'title' => 'Video Camera - Long', 'email' => 'bluearcticmedia@gmail.com', 'phone' => '+44 7415 721 917', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Alpha Barrie', 'title' => 'Video Camera - Handheld/JIB', 'email' => 'alphabarrie@me.com', 'phone' => '', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Tom Hackett', 'title' => 'Video Camera - Long', 'email' => 'downtheline@me.com', 'phone' => '+44 7912 447 353', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'John Wright', 'title' => 'Navcam Op', 'email' => 'wrightlive@hotmail.com', 'phone' => '+44 7940 647 712', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Nicki Graves', 'title' => 'Video Camera - Long', 'email' => 'nickigraves@hotmail.com', 'phone' => '+44 7595 658 481', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Kayla Humphries', 'title' => 'Media Server', 'email' => 'humphries.kaylarenee@gmail.com', 'phone' => '1-817-793-0141', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'David Liebling', 'title' => 'Steadicam Op', 'email' => 'davidliebling@gmail.com', 'phone' => '1-702-323-6440', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Rick Compeau', 'title' => 'Railcam - Crew Chief', 'email' => 'aanycdolly@mac.com', 'phone' => '1-908-295-6222', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Carsten Griebe', 'title' => 'Railcam 2', 'email' => 'carsten-griebe@web.de', 'phone' => '+49 170 366 6171', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Chris Ferguson', 'title' => 'Railcam 3', 'email' => 'chris@chrisferguson.tv', 'phone' => '1-818-939-9903', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Jonny Harkins', 'title' => 'Railcam 4', 'email' => 'jonnyharkins11@me.com', 'phone' => '1-845-548-7576', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Joe Victoria', 'title' => 'Railcam 5', 'email' => 'joevictoria@yahoo.com', 'phone' => '1-415-205-0411', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Dominic Bendijo', 'title' => 'Railcam 6', 'email' => 'domjuan@me.com', 'phone' => '1-310-579-7491', 'dept' => 'video', 'department_id' => 12],
            ['name' => 'Ryan Schultz', 'title' => 'Railcam 7 - Technician', 'email' => 'thegimbalguys@gmail.com', 'phone' => '1-607-743-6007', 'dept' => 'video', 'department_id' => 12],
            // AUTOMATION ========================================
            ['name' => 'Robin Henry', 'title' => 'Automation Crew Chief', 'email' => 'robinhenryuk@me.com', 'phone' => '+44 7901 794 972', 'dept' => 'automation', 'department_id' => 13],
            ['name' => 'Aaron Levy', 'title' => 'Automation Op (3D)', 'email' => 'soundnlite@aol.com', 'phone' => '1-603-498-8673', 'dept' => 'automation', 'department_id' => 13],
            ['name' => 'Todd Bleiman', 'title' => 'Automation Op (2D)', 'email' => 'todd.bleiman@taittowers.com', 'phone' => '1-847-989-6879', 'dept' => 'automation', 'department_id' => 13],
            ['name' => 'Joe Sheppard', 'title' => 'NavCam Bridal Op', 'email' => 'joe@joesheppard.co.uk', 'phone' => '+44 7908 819 273', 'dept' => 'automation', 'department_id' => 13],
            ['name' => 'Tim McCarthy', 'title' => 'Automation Tech/Asst Crew Chief', 'email' => 'tim.mccarthy@taittowers.com', 'phone' => '1-717-357-4805', 'dept' => 'automation', 'department_id' => 13],
            ['name' => 'Kewarn Dobson', 'title' => 'Automation Tech', 'email' => 'Kewarn.Dobson@taittowers.com', 'phone' => '', 'dept' => 'automation', 'department_id' => 13],
            ['name' => 'Emerson Shewmake', 'title' => 'Automation Tech', 'email' => 'Emerson.Shewmake@taittowers.com', 'phone' => '1-865-805-9666', 'dept' => 'automation', 'department_id' => 13],
            ['name' => 'Amanda Jobe', 'title' => 'Automation Tech', 'email' => 'amanda.jobe@taittowers.com', 'phone' => '1-724-464-4338', 'dept' => 'automation', 'department_id' => 13],
            ['name' => 'Divinia Foye', 'title' => 'Automation Tech', 'email' => 'martha.foye@taittowers.com', 'phone' => '1-609-346-3849', 'dept' => 'automation', 'department_id' => 13],
            ['name' => 'Dan McLaughlin', 'title' => 'Lead 3D Rigger', 'email' => 'daniel.mclaughlin@taittowers.com', 'phone' => '1-617-894-1658', 'dept' => 'automation', 'department_id' => 13],
            ['name' => 'Zachary Sands', 'title' => 'Automation Rigging', 'email' => 'zachary.sands@taittowers.com', 'phone' => '1-810-938-0703', 'dept' => 'automation', 'department_id' => 13],
            ['name' => 'Robert Molina', 'title' => 'Automation Rigging', 'email' => 'robert.molina@taittowers.com', 'phone' => '1-717-881-0744', 'dept' => 'automation', 'department_id' => 13],
            ['name' => 'Didi Geraldo', 'title' => 'Automation Rigging', 'email' => 'didier.giraldo@taittowers.com', 'phone' => '1-717-405-4708', 'dept' => 'automation', 'department_id' => 13],
            // sfx ===============================================
            ['name' => 'Stu Wickens', 'title' => 'sfx Crew Chief', 'email' => 'shwickens@gmail.com', 'phone' => '+44 7742 123 600', 'dept' => 'sfx', 'department_id' => 14],
            ['name' => 'Ricardo Valdillez', 'title' => 'sfx 2', 'email' => 'rvaldillez@pyrotecnico.com', 'phone' => '1-425-268-7460', 'dept' => 'sfx', 'department_id' => 14],
            ['name' => 'Jack Kingry', 'title' => 'Pyro Tech', 'email' => 'jkingry@pyrotecnico.com', 'phone' => '1-702-606-1950', 'dept' => 'sfx', 'department_id' => 14],
            ['name' => 'Tom Hart', 'title' => 'Laser Asst', 'email' => 'tom.c.hart95@gmail.com', 'phone' => '1-443-955-1631', 'dept' => 'sfx', 'department_id' => 14],
            ['name' => 'Casey Lake', 'title' => 'sfx 5', 'email' => 'cpyroboy@aol.com', 'phone' => '1-714-273-4864', 'dept' => 'sfx', 'department_id' => 14],
            ['name' => 'Richard Gonsalves', 'title' => 'sfx 6', 'email' => 'pugnews@rogers.com', 'phone' => '1-424-394-5811', 'dept' => 'sfx', 'department_id' => 14],
            ['name' => 'Freddy Price', 'title' => 'sfx 7', 'email' => 'fdlprc@gmail.com', 'phone' => '1-601-906-8457', 'dept' => 'sfx', 'department_id' => 14],
            // BARRIER ===========================================
            ['name' => 'Chris Kordek', 'title' => 'Barricade 1', 'email' => 'kordek@icloud.com', 'phone' => '', 'dept' => 'barrier', 'department_id' => 15],
            // CATERING ==========================================
            ['name' => 'Nicolai Creatore', 'title' => 'Chef', 'email' => 'nvcreatore@gmail.com', 'phone' => '1-804-920-0363', 'dept' => 'catering', 'department_id' => 16],
            ['name' => 'Jason Bright', 'title' => 'Chef - Crew Chief', 'email' => 'Chef.jasonbright@yahoo.co.uk', 'phone' => '+44 7925 600 950', 'dept' => 'catering', 'department_id' => 16],
            ['name' => 'Tristan Conway-Grim', 'title' => 'Chef', 'email' => 'tristanconwaygrim@icloud.com', 'phone' => '+44 7544 739 107', 'dept' => 'catering', 'department_id' => 16],
            ['name' => 'Django Widdowson-Jones', 'title' => 'Chef', 'email' => 'django.widdowson.jones@gmail.com', 'phone' => '+44 7403 647 90', 'dept' => 'catering', 'department_id' => 16],
            ['name' => 'Trevor Bantin', 'title' => 'Chef', 'email' => 'Talltrev@icloud.com', 'phone' => '+44 7767 846 787', 'dept' => 'catering', 'department_id' => 16],
            ['name' => 'Tiffany Williams', 'title' => 'Chef', 'email' => 'tiffanywilliams1383@gmail.com', 'phone' => '1-773-355-9969', 'dept' => 'catering', 'department_id' => 16],
            ['name' => 'Grant Bird', 'title' => 'Pastry Chef', 'email' => 'grantacake@gmail.com', 'phone' => '1-706-816-5873', 'dept' => 'catering', 'department_id' => 16],
            ['name' => 'Ezra Brown', 'title' => 'Vegan Chef', 'email' => 'fruitfulindustry@gmail.com', 'phone' => '+44 7837 270 471', 'dept' => 'catering', 'department_id' => 16],
            ['name' => 'Angelina Brown', 'title' => 'FOH', 'email' => 'angelina.bache@hotmail.de', 'phone' => '+49 163 780 9150', 'dept' => 'catering', 'department_id' => 16],
            ['name' => 'Savannah Bierma', 'title' => 'dressing_room', 'email' => 'savannahcloset@gmail.com', 'phone' => '1-262-389-8145', 'dept' => 'catering', 'department_id' => 16],
            ['name' => 'Chloe Gray', 'title' => 'dressing_room', 'email' => 'chloeegray@yahoo.com', 'phone' => '1-414-559-5468', 'dept' => 'catering', 'department_id' => 16],
            ['name' => 'Tayu Lopez Rivera', 'title' => 'Aftershow/Bus Stock', 'email' => 'tj.lopez@icloud.com', 'phone' => '+44 7871 821 674', 'dept' => 'catering', 'department_id' => 16],
            ['name' => 'Syl Penha', 'title' => 'FOH', 'email' => 'p.sylvia.portugal@googlemail.com', 'phone' => '+351 914 978 806', 'dept' => 'catering', 'department_id' => 16],
            // MERCH =============================================
            // live_nation_touring ===============================
            ['name' => 'Alison Larkin', 'title' => 'LN tour Director', 'email' => 'AlisonLarkin@LiveNation.com', 'phone' => '1-816-914-2243', 'dept' => 'live_nation_touring', 'department_id' => 18],
            ['name' => 'Paul DiNapoli', 'title' => 'LN Tour Accountant', 'email' => 'PaulDiNapoli@LiveNation.com', 'phone' => '1-609-870-2082', 'dept' => 'live_nation_touring', 'department_id' => 18],
            ['name' => 'Anthony Amor', 'title' => 'LN production accountant', 'email' => 'anthonyamor@livenation.com', 'phone' => '1 786 553 1256', 'dept' => 'live_nation_touring', 'department_id' => 18],
            ['name' => 'Emma Saxby', 'title' => 'LN Production Coordinator', 'email' => 'emmasaxby@livenation.com', 'phone' => '44 7949 085 136', 'dept' => 'live_nation_touring', 'department_id' => 18],
            ['name' => 'Stacey Saari', 'title' => 'LN Ticketing Manager', 'email' => 'StaceySaari@LiveNation.com', 'phone' => '1 816 674 8695', 'dept' => 'live_nation_touring', 'department_id' => 18],
            ['name' => 'Audrey Voggenthaler', 'title' => 'LN Tour Assistant', 'email' => 'audreyvogg@gmail.com', 'phone' => '44 7727 198 752', 'dept' => 'live_nation_touring', 'department_id' => 18],
            ['name' => 'Justin Mcquown', 'title' => 'LN Health & Safety', 'email' => 'j.mcquown@phalanxgroupintl.com', 'phone' => '1 757 748 3916', 'dept' => 'live_nation_touring', 'department_id' => 18],
            ['name' => 'Michael Johnson', 'title' => 'LN Health & Safety', 'email' => 'm.johnson@phalanxgroupintl.com', 'phone' => '1 203 788 7492', 'dept' => 'live_nation_touring', 'department_id' => 18],
            ['name' => 'Aoife Ahern', 'title' => 'LN VIP NATION Lead', 'email' => 'aoife.a@gmail.com', 'phone' => '+353834439366', 'dept' => 'live_nation_touring', 'department_id' => 18],
            ['name' => 'Nic Sheasby', 'title' => 'LN VIP NATION', 'email' => 'niksheasby@gmail.com', 'phone' => '1 215 510 3419', 'dept' => 'live_nation_touring', 'department_id' => 18],
            ['name' => 'Devon O\’Heron', 'title' => 'LN VIP NATION', 'email' => 'devon.oheron@vipnation.com', 'phone' => '1 508 641 9448', 'dept' => 'live_nation_touring', 'department_id' => 18],
            ['name' => 'Penny Baker', 'title' => 'LN VIP NATION', 'email' => 'Pennybakerblue@outlook.com', 'phone' => '44 7432 650 519', 'dept' => 'live_nation_touring', 'department_id' => 18],
            // MANAGEMENT ========================================
            ['name' => 'Marty Hom', 'title' => 'Tour Director', 'email' => 'martyhom@aol.com', 'phone' => '1-310-614-7644', 'dept' => 'management', 'department_id' => 19],
            ['name' => 'Marlon Bower', 'title' => 'Tour Manager', 'email' => 'Marlonb@mac.com', 'phone' => '1-832-477-4304', 'dept' => 'management', 'department_id' => 19],
            ['name' => 'Dan McGee', 'title' => 'Tour Financial Director', 'email' => 'dan@mcgeemanagement.com', 'phone' => '1-646-541-0236', 'dept' => 'management', 'department_id' => 19],
            // CREATIVE ==========================================
            ['name' => 'Ric Lipson', 'title' => 'Stufish', 'email' => 'ric@stufish.co.uk', 'phone' => '44 794 707 2994', 'dept' => 'creative', 'department_id' => 20],
            ['name' => 'Rachel Duncan', 'title' => 'Stufish', 'email' => 'rachel@stufish.co.uk', 'phone' => '44 207 383 8833', 'dept' => 'creative', 'department_id' => 20],
            ['name' => 'Tobias Rylander', 'title' => 'Lighting Designer', 'email' => 'tobias@tobiasrylander.com', 'phone' => '+46 70-565 45 20', 'dept' => 'creative', 'department_id' => 20],
            // VENDORS ===========================================
            ['name' => 'Hannibal Contreras', 'title' => 'PRG - Video', 'email' => 'Hannibal.Contreras@prg.com', 'phone' => '1 562 743 3410', 'dept' => 'vendors', 'department_id' => 21],
            ['name' => 'Lizz Bender', 'title' => 'Tait', 'email' => 'lizz.bender@taittowers.com', 'phone' => '1 717 413 1913', 'dept' => 'vendors', 'department_id' => 21],
            ['name' => 'Kevin Donnelly', 'title' => 'Tait', 'email' => 'kevin.donnelly@taittowers.com', 'phone' => '1-717-673-6578', 'dept' => 'vendors', 'department_id' => 21],
            ['name' => 'Lucy Young', 'title' => 'PRG - Lights', 'email' => 'lucy.young@prg.com', 'phone' => '+44 7596 859 462', 'dept' => 'vendors', 'department_id' => 21],
            ['name' => 'Katrina Grice', 'title' => 'PRG - Lights', 'email' => 'katrina.grice@prg.com', 'phone' => '', 'dept' => 'vendors', 'department_id' => 21],
            ['name' => 'Jason Kirschnick', 'title' => 'Eight Day Sound - Audio', 'email' => 'jasonk@8thdaysound.com', 'phone' => '1-440-476-9547', 'dept' => 'vendors', 'department_id' => 21],
            ['name' => 'Woody Wahlen', 'title' => 'Delico - Catering', 'email' => 'hallowoody@icloud.com', 'phone' => '1-910-228 2048', 'dept' => 'vendors', 'department_id' => 21],
            ['name' => 'Danielle Hicks', 'title' => 'sfx - Pyrotecnico', 'email' => 'danielle@pyrotecnico.com', 'phone' => '1 724.923.6637', 'dept' => 'vendors', 'department_id' => 21],
            ['name' => 'Laura Hurlocker', 'title' => '4th Generation', 'email' => 'laura@fourthgenerationltd.com', 'phone' => '+44 7802 989 922 ', 'dept' => 'vendors', 'department_id' => 21],
            ['name' => 'Okan Tombulca', 'title' => 'Barricade', 'email' => 'Okan@eps.net', 'phone' => '+49 171 260 7417', 'dept' => 'vendors', 'department_id' => 21],
            ['name' => 'Seba Tobie', 'title' => 'Barricade', 'email' => 'sebastian.tobie@eps.net', 'phone' => '+49 176 147 57 037', 'dept' => 'vendors', 'department_id' => 21],
        ]);

    }
}
