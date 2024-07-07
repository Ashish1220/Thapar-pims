<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class subscribe_info extends Controller

{
    public function subscribe_infor(Request $r)
    {
        $name = $r->input('name');
        $phone = $r->input('phone-number');
        $rollNumber = $r->input('thapar-rollno');
        $filename = 'C:\xampp\htdocs\thapar-pims\thapar-pims\users.csv';
        $found = false;
        $headers = [];

        if (($handle = fopen($filename, 'r')) !== false) {
            $headers = fgetcsv($handle);

            if ($headers !== false) {
                while (($data = fgetcsv($handle)) !== false) {
                    if (count($data) >= 2) {
                        $column2Value = $data[1];

                        if ($column2Value == $phone) {
                            $found = true;
                            break;
                        }
                    }
                }
            } else {
                echo "Error reading headers.";
            }

            fclose($handle);
        } else {
            echo "Error opening database.";
        }

        if (!$found) {
            $rows = [$name, $phone, $rollNumber];

            if (($handle = fopen($filename, 'a')) !== false) {
                $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $code = '';
                $max = strlen($characters) - 1;

                for ($i = 0; $i < 5; $i++) {
                    $code .= $characters[random_int(0, $max)];
                }
                $rows[]=$code;
                fputcsv($handle, $rows);
                fclose($handle);

                return "Subscribed! your unique code for unsubscribing is : $code .Please note it down somewhere";
            } else {
                echo "Error opening database for writing.";
            }
        } else {
            return "We remember you!";
        }

        return "Subscription Successful";
    }

    public function unsubscribe_infor(Request $r) {
        $phoneNumber = $r->input('phone-number');
        $code = $r->input('unique-code');
        
        $filename = 'C:\xampp\htdocs\thapar-pims\thapar-pims\users.csv';
        $tempFilename = 'C:\xampp\htdocs\thapar-pims\thapar-pims\temp_users.csv'; // Temporary file for writing updated data
        $found = false;
    
        // Open the CSV file for reading
        if (($handle = fopen($filename, 'r')) !== false) {
            // Open a temporary file for writing updated data
            if (($tempHandle = fopen($tempFilename, 'w')) !== false) {
                // Read headers
                $headers = fgetcsv($handle);
    
                if ($headers !== false) {
                    // Write headers to the temporary file
                    fputcsv($tempHandle, $headers);
    
                    // Get column indexes for Number and unique_code
                    $numberIndex = array_search('Number', $headers);
                    $codeIndex = array_search('unique_code', $headers);
    
                    // Iterate through each row in the CSV file
                    while (($data = fgetcsv($handle)) !== false) {
                        // Check if phone number and code match
                        if ($data[$numberIndex] == $phoneNumber && $data[$codeIndex] == $code) {
                            $found = true; // Mark as found, skip writing this row
                        } else {
                            // Write non-matching rows to the temporary file
                            fputcsv($tempHandle, $data);
                        }
                    }
    
                    // Close both file handles
                    fclose($handle);
                    fclose($tempHandle);
    
                    // Replace the original file with the temporary file
                    rename($tempFilename, $filename);
    
                    if ($found) {
                        return "Unsubscribed successfully.";
                    } else {
                        return "Credentials are wrong.";
                    }
                } else {
                    fclose($handle);
                    return "Error reading DB.";
                }
            } else {
                fclose($handle);
                return "Error opening temporary DB for writing.";
            }
        } else {
            return "Error opening DB.";
        }
    }
    
}
