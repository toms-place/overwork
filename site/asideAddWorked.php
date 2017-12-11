
<div class="form">
    <div class="formHead">
        <h2>
            <label form="selectCustomer">set Customer</label>
        </h2>
    </div>
    <div class="formBody">
        <form id="selectCustomer" action="controller/setCustomer.php" method="post" data-autosubmit>

            <label for="selectName">Name:</label>
            <select name="selectName" id="selectName">
            </select>
            <input type="hidden" name="table" value="selectedCustomer">
            <input type="hidden" name="query" value="selectedCustomer">


            <input type="submit" value="select Customer">

        </form>
    </div>
</div>