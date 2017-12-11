<div class="form">
    <div class="formHead">
        <h2>
            <label form="postCustomer">add new Customer</label>
        </h2>
    </div>
    <div class="formBody">
        <form id="postCustomer" action="controller/postCustomer.php" method="post" data-autosubmit>

            <label for="name">Name:</label>
            <input type="text" id="name" name="c_1" placeholder="Name of Business..">

            <label for="surname">Surname:</label>
            <input type="text" id="surname" name="c_2" placeholder="Description of Business..">

            <label for="adress">Adress:</label>
            <input type="text" id="adress" name="c_3" placeholder="Adress of Business..">

            <input type="submit" value="Add new Customer">

        </form>
    </div>
</div>