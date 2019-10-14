<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lucky Draw</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <script src="{{ asset('js/script.js')}}"></script>

</head>
<body>
    <div class="form_control">
        <h1>Lucky Draw</h1>
        <form class="lucky_form" action="/" method="POST">
            <hr>
            <div class="price_type">
                <label for="priceType">Prize Type *</label>
                <select name="priceType" id="priceType">
                    <option selected disabled>Please Select</option>
                    <option value="firstPrize">First Prize</option>
                    <option value="second-one">Second Prize - First Winner</option>
                    <option value="second-two">Second Prize - Second Winner</option>
                    <option value="third-one">Third Prize - First Winner</option>
                    <option value="third-two">Third Prize - Second Winner</option>
                    <option value="third-three">Third Prize - Third Winner</option>
                </select>
            </div>
            <div class="generate_no">
                <label for="generateRandom">Generate Randomly</label>
                <select name="generateRandom" id="generateRandom">
                    <option disabled selected>Please Select</option>
                    <option value="0">Yes</option>
                    <option value="1">No</option>
                </select>
            </div>
            <div class="winning_no">
                <label for="winningNo">Winning Number</label>
            <input type="number" name="winningNo"  id="winningNo">
            <a id="btn_generate" href="#">Generate</a>
            </div>
            <hr>
            <input class="btn_draw" type="submit" value="Draw">
        </form>
    </div>
    <script>
        var generateRandom = document.getElementById('generateRandom');
        var winningNo = document.getElementById('winningNo');
        var go = document.getElementById('btn_generate');
         window.onload = function(){
            go.style.display = "none";
        }
        generateRandom.onchange = function() {
            if (generateRandom.value === "0") {
                winningNo.disabled = true;
                go.style.display = "block";
            } else {
                winningNo.disabled = false;
                go.style.display = "none";
            }
        }
    </script>
</body>
</html>