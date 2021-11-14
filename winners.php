<?php require 'partials/_validation.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="description"
      content="Motive, Movement and Opportunity, we've got it all here at VITFAM's DeFRAUDER. It is time to fish out the fraud in our suspenseful stories. With clues and hints lined up all along the way, just like a treasure hunt for lost treasures, the ball is in your court to figure out the mastermind schemer and their scheme in the exciting and fast-moving tales we've got lined up for you."
    />
    <link rel="shortcut icon" href="./images/VITFAM.png" type="image/x-icon" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative&display=swap"
      rel="stylesheet"
    />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./style/style.css" />
    <title>VITFAM | DeFRAUDER | WINNERS</title>
  </head>

  <body
    style="
      background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
        url('https://wallpapercave.com/wp/wp2508415.jpg');
    "
  >
    <div id="loader">
      <div class="clock-loader"></div>
    </div>

    <audio id="my_audio" src="./music/DeFrauder.mp3" loop="loop"></audio>

    <?php require './partials/_header.php'; ?>

    <div class="container main-heading">
      <!-- Add particles js -->
      <div id="particles-js"></div>

      <div class="inner-data">
        <div class="container mb-5">
          <h2
            style="font-family: 'Cinzel Decorative', cursive; font-size: 50px"
          >
            ResUlt
          </h2>
          <table
            class="
              table table-bordered table-responsive
              w-75
              mx-auto
              my-5
              text-light
              fs-5
              align-middle
            "
          >
            <thead class="text-center">
              <tr>
                <th scope="col">S. No.</th>
                <th scope="col">Participants Name</th>
                <th scope="col">Name of the Story</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th class="text-center" scope="row">1</th>
                <td class="px-4">
                  Sree Viswanath <br />
                  Arjun K Swamy <br />
                  Himakshi Jammar <br />
                </td>
                <td class="px-4">DEAD IN DAYLIGHT</td>
              </tr>
              <tr>
                <th class="text-center" scope="row">2</th>
                <td class="px-4">
                  Abhishek Kumar <br />
                  Ramireddy Jeevan Reddy <br />
                  Joshua Jose <br />
                </td>
                <td class="px-4">MURDER ON THE RACE TRACK</td>
              </tr>
              <tr>
                <th class="text-center" scope="row">3</th>
                <td class="px-4">George Mathew</td>
                <td class="px-4">FAMILY TIES ?</td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <th style="border: none" scope="col">Special Mention</th>
                <th style="border: none"></th>
                <th style="border: none"></th>
              </tr>
              <tr>
                <th class="text-center" scope="row">1</th>
                <td class="px-4">Anant Vedansh</td>
                <td class="px-4">DEAD IN DAYLIGHT</td>
              </tr>
              <tr>
                <th class="text-center" scope="row">2</th>
                <td class="px-4">Yash Bhootda</td>
                <td class="px-4">FAMILY TIES ?</td>
              </tr>
              <tr style="border: none">
                <td style="border: none; padding: 0"></td>
                <td style="border: none; padding: 0"></td>
                <td style="border: none; padding: 0">
                  <div class="my-4" style="margin: -9px; float: right">
                    <a
                      href="./index.php"
                      class="btn btn-warning text-dark mx-2 px-4"
                      >HOME</a
                    >
                  </div>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
      crossorigin="anonymous"
    ></script>

    <script>
      window.onload = async () => {
        try {
          await document.getElementById("my_audio").play();
        } catch (err) {
          // console.log(err); // console cleared
        }
      };
    </script>

    <script src="./js/main.js"></script>
    <script src="./js/particle.js"></script>
  </body>
</html>
