<?php
include("../customer/Functions/functions.php");
aloc();
?>
    <?php
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  */
/*  Selection of points within specified radius of given lat/lon      (c) Chris Veness 2008-2016  */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  */

    $lat=19.0748;
    $lon=72.8856;
    $rad = 1;
    $R = 6371;  // earth's mean radius, km

    // first-cut bounding box (in degrees)
    $maxLat = $lat + rad2deg($rad/$R);
    $minLat = $lat - rad2deg($rad/$R);
    $maxLon = $lon + rad2deg(asin($rad/$R) / cos(deg2rad($lat)));
    $minLon = $lon - rad2deg(asin($rad/$R) / cos(deg2rad($lat)));

    $sql = "select c_email,c_name, lat, log,
                   acos(sin(:lat)*sin(radians(lat)) + cos(:lat)*cos(radians(lat))*cos(radians(log)-:lon)) * :R As D
            From (
                select c_email,c_name, lat, log
                from location
                where lat Between :minLat And :maxLat
                  And log Between :minLon And :maxLon
            ) As FirstCut
            Where acos(sin(:lat)*sin(radians(lat)) + cos(:lat)*cos(radians(lat))*cos(radians(log)-:lon)) * :R < :rad
            Order by D";
    $params = [
        'lat'    => deg2rad($lat),
        'lon'    => deg2rad($lon),
        'minLat' => $minLat,
        'minLon' => $minLon,
        'maxLat' => $maxLat,
        'maxLon' => $maxLon,
        'rad'    => $rad,
        'R'      => $R,
    ];
    $points =prepare($sql);
    $points->execute($params);




const R = 6371e3; // earth's mean radius in metres
const sin = Math.sin, cos=Math.cos, acos = Math.acos;
const π = Math.PI;

// query selection parameters: latitude, longitude & radius of bounding circle
const lat = Number(process.argv[2]);    // or e.g. req.query.lat (degrees)
const lon = Number(process.argv[3]);    // or e.g. req.query.lon (degrees)
const radius = Number(process.argv[4]); // or e.g. req.query.radius; (metres)


// query points within first-cut bounding box (Lat & Lon should be indexed for fast query)
const sql = `
    Select Id, Postcode, Lat, Lon
    From MyTable
    Where Lat Between :minLat And :maxLat
      And Lon Between :minLon And :maxLon`;
const params = {
    minLat: lat - radius/R*180/π,
    maxLat: lat + radius/R*180/π,
    minLon: lon - radius/R*180/π / cos(lat*π/180),
    maxLon: lon + radius/R*180/π / cos(lat*π/180),
};
const [ pointsBoundingBox ] = await Db.execute(sql, params);
Db.end(); // close connection

// add in distance d = acos( sinφ₁⋅sinφ₂ + cosφ₁⋅cosφ₂⋅cosΔλ ) ⋅ R
pointsBoundingBox.forEach(p => { p.d = acos(sin(p.Lat*π/180)*sin(lat*π/180) +
    cos(p.Lat*π/180)*cos(lat*π/180)*cos(p.Lon*π/180-lon*π/180)) * R })

// filter for points with distance from bounding circle centre less than radius, and sort
const pointsWithinCircle = pointsBoundingBox.filter(p => p.d < radius).sort((a, b) => a.d - b.d);

console.log(pointsWithinCircle); // or e.g. res.render('points', { points: pointsWithinCircle });
?>

        <html>
        <table>
            <? foreach ($points as $point): ?>
                <tr>
                    <td>
                        <?= $point->c_name ?>
                    </td>
                    <td>
                        <?= number_format($point->lat,4) ?>
                    </td>
                    <td>
                        <?= number_format($point->log,4) ?>
                    </td>
                    <td>
                        <?= number_format($point->D,3) ?>
                    </td>
                </tr>
                <? endforeach ?>
        </table>

        </html>