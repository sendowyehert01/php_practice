<?php require 'partials/head.php'; ?>
<?php require 'partials/nav.php'; ?>
<?php require 'partials/banner.php'; ?>

  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <form>
        <label for="body">Note Description</label>
          <div>
            <textarea name="body" id="body" cols="30" rows="10"></textarea>
          </div>
        <p>
          <button type="submit">Submit</button>
        </p>
      </form>
    </div>
  </main>
  
<?php require 'partials/foot.php'; ?>