@if($errors->any())
    <div class="mb-5">
        <?php echo implode('', $errors->all('<div class="text-danger mb-1">:message</div>')); ?>
    </div>
@endif