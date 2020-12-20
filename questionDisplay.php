<?php include(); ?>
<table>
    <tr>
        <th>Name</th>
        <th>Body</th>
    </tr>
    <?php foreach ($questions as $question) : ?>
        <tr>
            <td><?php echo $question['title']; ?></td>
            <td><?php echo $question['body']; ?></td>
        </tr>

    <?php endforeach; ?>
</table>
