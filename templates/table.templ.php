<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>file</th>
                <th>size</th>
                <th>thumbnail</th>
                <th>download</th>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach ($main->load_files() as $file_string) : 
                $file = new Files($file_string);
            ?>

            <tr>
                <td><?php echo $file->basename; ?></td>
                <td><?php echo $file->size; ?></td>
                <td><img src="<?php echo $file->thumbnail; ?>"></td>
                <td><a href="<?php echo $file->full_url; ?>"><?php echo $file->full_url; ?></a></td>
            </tr>

            <?php endforeach; ?> 
        </tbody>
    </table>  
</div>