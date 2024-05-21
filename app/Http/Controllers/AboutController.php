<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $linksArray = [
            "hero_img" => "https://www.medibank.com.au/livebetter/be-magazine/food/the-doctors-dinner-table/",
            "workoutplan1" => "https://www.allysangels.com.au/how-to-avoid-overtraining-when-working-out-six-days-a-week/",
            "workoutplan2" => "https://prod-ne-cdn-media.puregym.com/media/819394/gym-workout-plan-for-gaining-muscle_header.jpg?quality=80",
            "hammer_curl" => "https://www.inspireusafoundation.org/crossbody-hammer-curl/",
            "dips" => "https://www.skimble.com/exercises/68277-dips-how-to-do-exercise",
            "standing_calf_raises" => "https://www.skimble.com/exercises/54664-standing-calf-raise-how-to-do-exercise",
            "barbell_squats" => "https://www.inspireusafoundation.org/barbell-squat/",
            "barbell_front_squat" => "https://savedollar.us/barbell-front-squat/",
            "hack_squat" => "https://www.inspireusafoundation.org/the-hack-squat/",
            "seated_leg_curls" => "https://www.t-nation.com/training/leg-curls-seated-lying-or-standing/",
            "crunches" => "https://www.thegymgroup.com/exercises/abs-and-core-exercises/how-to-do-crunches/",
            "leg_raises" => "https://www.hevyapp.com/exercises/leg-raises/",
            "standing_military_presses" => "https://homegymreview.co.uk/barbell-standing-military-press-without-rack/",
            "standing_lateral_raises" => "https://www.jasestuart.com/standing-dumbbell-lateral-raises",
            "wide_pulldown" => "https://www.dmoose.com/blogs/muscle-building/top-10-lat-pulldown-variations-stronger-wider-back",
            "close_pulldown" => "https://www.gofitnessplan.com/exercises/close-grip-chest-pulldown",
            "bent_over_rows" => "https://www.menshealth.com/uk/building-muscle/a757301/how-to-master-the-bent-over-row/",
            "t_bar_rows" => "https://www.menshealth.com/uk/how-tos/a735444/t-bar-row/",
            "bench_press" => "https://i.ytimg.com/vi/SCVCLChPQFY/maxresdefault.jpg",
            "inclined_bench_press" => "https://hips.hearstapps.com/hmg-prod/images/incline-barbell-bench-press-640731bc88b98.jpg",
            "dumbbell_flyes" => "https://shapeinsider.medium.com/standing-dumbbell-fly-how-to-benefits-safety-variations-1ee761febcba",
            "standing_barbell_curl" => "https://www.betterbodyacademy.com/traininbiceps/wide-grip-standing-ez-bar-curl",
            "seated_dumbbell_curl" => "https://the-optimal-you.com/seated-dumbbell-curl/",
            "lying_triceps_extension" => "https://fitnessvolt.com/dumbbell-lying-triceps-extension/",
            "standing_barbell_curl" => "https://www.betterbodyacademy.com/traininbiceps/wide-grip-standing-ez-bar-curl",
            "triceps_extension_with_cable" => "https://www.amazon.in/GymnGymTM-Attachment-Extension-building-Equipment/dp/B07HY2TPML",
            "pullups" => "https://physics.stackexchange.com/questions/110638/when-we-do-pull-ups-does-the-bar-takes-more-weight-than-when-we-hang-down-on-th"
        ];

        return view('about', compact('linksArray'));
    }
}
