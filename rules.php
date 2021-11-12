<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="./images/VITFAM.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/style.css">
    <title>VITFAM | Guidelines</title>
    <style>
    li {
        line-height: 30px;
        list-style: none;
        text-align: justify;
    }

    li::before {
        content: "\2022";
        color: #FFF;
        font-weight: bold;
        display: inline-block;
        width: 1em;
        margin-left: -1em;
    }

    .imp {
        color: #0F0;
        text-transform: uppercase;
    }

    .error {
        color: #F00;
        text-transform: uppercase;
    }
    </style>
</head>

<body>
    <div id="loader">
        <div class="clock-loader"></div>
    </div>

    <?php  require './partials/_header.php'; ?>

    <div class="container my-5">
        <h1 class="text-center mb-3 text-uppercase">Guidelines</h1>
        <h4>General Instructions</h4>
        <ul>
            <li>You have 15 minutes to go over the guidelines. Please take your time to read through all of the points.
            </li>
            <li>The game must be played on a single device with a reliable connection (ideally a PC).</li>
            <li>Network issues will NOT be entertained.</li>
            <li>The game can only be accessed and played by the team leader.</li>
            <li>You will NOT be allowed to login to the game again if you log out before the game's permitted time has
                expired.</li>
            <li>At <span class="imp">02:30 PM</span>, the game will start for everyone.</li>
            <li>The game will begin with the story introduction. By clicking on <span class="imp">"CHECK THE
                    STORY"</span> at any point during the game, teams can read the Story.</li>
            <li>The game is split into three stages, each with five hints.</li>
            <li>Pay great attention to the details in each clue to get a hint(s) to the real truth.</li>
            <li>There will be a bonus question after each stage that will award you bonus points.</li>
            <li>After selecting <span class="imp">"SUBMIT"</span>, the team will not be able to change their bonus
                question response.</li>
            <li>Following the three phases, there is a <span class="imp">"Question Round"</span>, which serves as the
                ultimate showdown. There are three mandatory questions for you to answer.</li>
            <li>These will be subjective questions, and the teams are expected to provide inferences that are supported
                by substantial reasoning. The team that comes the closest to the truth and produces relevant evidence to
                back it up will be declared the winner.</li>
            <li>The game will end for everyone at <span class="imp">04:00 PM</span> sharp.</li>
        </ul>

        <h4 class="mt-5">Disqualification</h4>
        <ul>
            <li>Using any form of <span class="error">FOUL</span> language in the answers.</li>
            <li>Using any unethical tactics during or before the game.</li>
        </ul>

        <h4 class="mt-5">Grading System</h4>
        <ul>
            <li>The keywords in your responses will determine the number of points you earn.</li>
            <li>Each bonus question is worth 5 points, while the Question Round questions are for 10 points each.</li>
            <li class="text-uppercase text-info fw-bold">In any and all situations, VITFAM's judgement is final and
                binding.</li>
        </ul>

        <p class="text-center mt-5 fs-5">Put on your thinking cap and start the investigation. We're confident that
            you'll be able to apprehend the fraudster and decipher the master plan.</p>
        <p class="text-uppercase text-center fw-bold text-warning fs-4 mt-4">All the best to you!</p>

    </div>

    <?php require './partials/_footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
    <script src="./js/main.js"></script>
</body>

</html>