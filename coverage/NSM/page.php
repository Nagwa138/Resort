<?php include 'header.php'; ?>
<div class="page">
    <div class="container">
        <h1 class=" text-center">Egypt Destination</h1>
        <form>
            <div class="row form-group">
                <label class="col-3" for="destination">Select Your Destination</label>
                <select class="col-9 form-control" id="destination">
                    <option>Alexandria</option>
                    <option>Marsa Matroh</option>
                    <option>Ras El-bar</option>
                    <option>Ismalia</option>
                    <option>Balteem</option>
                    <option>Others</option>
                </select>
            </div>
            <div class="row form-group">
                <label class="col-3" for="people">Number Of People</label>
                <select multiple class="col-9 form-control" id="people">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-group">
                <legend class="col-form-label col-3 pt-0">On Sea</legend>
                <div class="col-9">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                        <label class="form-check-label" for="gridRadios1">
                        Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                        <label class="form-check-label" for="gridRadios2">
                        No
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include 'footer.php'; ?>
