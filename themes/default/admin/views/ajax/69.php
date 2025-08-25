<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<h2 class="output_heading hidden">বৃদ্ধিকৃতদের মধ্য থেকে আউটপুট ক্যাটাগরিভূক্ত </h2>

<h2 class="output_heading_manpower">জনশক্তির আউটপুট</h2>
<b>কওমি মাদ্রাসা</b><br /><br />
<input name="institution_type_id" type="hidden" value="<?php echo  $institution_type_id; ?>" />

<table style="border-collapse: collapse; border-style: solid;" border="1" cellspacing="0" cellpadding="0">
    <tbody>
        <tr style="height: 27.6pt;">
            <td rowspan="2">মাধ্যমিক স্তরের মেধাবী শিক্ষার্থী</td>
            <td colspan="2">সর্বশেষ পরীক্ষায় GPA-5 প্রাপ্ত</td>
            <td colspan="2">ডিপার্টমেন্টে প্লেসধারী (১-৫)</td>
            <td rowspan="2">প্রভাবশালী পরিবারের সন্তান</td>
            <td rowspan="2">মাধ্যমিক ও উচ্চ মাধ্যমিক বিজ্ঞানে অধ্যয়নরত</td>
            <td rowspan="2">কওমী মাদরাসায় অধ্যয়নরত</td>
            <td rowspan="2">মেডিকেল কলেজে অধ্যয়নরত</td>
            <td rowspan="2">আদর্শ কলেজে অধ্যয়নরত&nbsp;</td>
            <td colspan="5">সরকারী বিশ্ববিদ্যালয়ে অধ্যয়নরত (বিভাগভিত্তিক)</td>
        </tr>
        <tr style="height: 36.0pt;">
            <td>SSC/Dhakil/সমমান<br />&nbsp;GPA-5</td>
            <td>HSC/Alim/সমমান<br />&nbsp;GPA-5</td>
            <td>সরকারি</td>
            <td>বেসরকারি</td>
            <td>প্রকৌশল</td>
            <td>কৃষি শিক্ষা</td>
            <td>সাধারণ বিজ্ঞান</td>
            <td>ব্যবসায় শিক্ষা</td>
            <td>মানবিক</td>
        </tr>
        <tr style="height: 12.75pt;">
            <td><input name="member_single_digit" value="1" type="checkbox" /></td>

            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><input name="member_influential" value="1" type="checkbox" /></td>
            <td></td>
            <td><input name="member_madrasha" value="1" type="checkbox" /></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>