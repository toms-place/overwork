<div class="form">
    <div class="formHead">
        <h2>
            <label form="selectCustomer">Select a Customer!</label>
        </h2>
    </div>
    <div class="formBody">
        <form id="selectCustomer" action="model/selectCustomer.php" method="post" data-autosubmit>

            <label for="getCustomerNamesAsOptions">Name:</label>
            <select name="getCustomerNamesAsOptions" id="getCustomerNamesAsOptions">
            </select>
            <input type="submit" value="select Customer">

        </form>
    </div>
</div>


<div class="form">
<div class="formHead">
    <h2>
        <label form="postWorked">Have you been working?</label>
    </h2>
</div>
<div class="formBody">
    <form id="postWorked" action="model/postWorked.php" method="post" data-autosubmit>

        <label for="minutes">Time worked:</label>
        <input type="number" id="minutes" name="c_1" placeholder="minutes">

        <label for="price">Price per hour:</label>
        <input type="number" id="price" name="c_2" value="15" placeholder="price per hour">

        <label for="date">Date:</label>
        <input type="date" id="date" name="c_3" placeholder="date">

        <input type="submit" value="add Worked Time">

    </form>
</div>
</div>

<div class="form">
<div class="formHead">
    <h2>
        <label form="postPayment">Did the customer pay?</label>
    </h2>
</div>
<div class="formBody">
    <form id="postPayment" action="model/postPayment.php" method="post" data-autosubmit>

        <label for="date">Date:</label>
        <input type="date" id="date" name="c_1" placeholder="date">

        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="c_2" placeholder="amount">

        <input type="submit" value="add Payment">

    </form>
</div>
</div>