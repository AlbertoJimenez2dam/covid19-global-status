<br>
<div class="quote">
    <?php
        if ($updatedCountry != null) {
            echo '<b>Newer data found; country data has been updated.</b><br><br>';
        }
        
        echo ''
                . '<b>Country:</b> ' . $country->getCountry() . '<br>'
                . '<b>Last updated:</b> ' . $country->getLastModified() . '<br>'
                . '<br>'
                . '<b>Active cases:</b> ' . $country->getActiveCases() . '<br>'
                . '<b>New cases:</b> ' . $country->getNewCases() . '<br>'
                . '<b>Deceased:</b> ' . $country->getDeceased() . '<br>'
                . '<b>Total cases:</b> ' . $country->getTotalCases() . '<br>'
                . '<b>Total deceased:</b> ' . $country->getTotalDeceased() . '<br>'
                . '<b>Total recovered:</b> ' . $country->getTotalRecovered() . '<br>';
    ?>
</div>
