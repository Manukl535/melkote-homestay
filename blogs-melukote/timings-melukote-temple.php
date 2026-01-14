<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timings in Melkote Temple</title>

    <section class="timings-section">
        <h2>Melkote Temple Timings</h2>
        <p class="subtitle">
            Opening, Closing, Darshan and Pooja Timings for Cheluvanarayana Swamy and Yoga Narasimha Temples
        </p>

        <div class="timing-card">
            <h3>Cheluvanarayana Swamy Darshan Timings</h3>

            <table>
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Days</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>7:30 am – 1:00 pm</td>
                        <td>Monday to Friday</td>
                    </tr>
                    <tr>
                        <td>7:30 am – 1:30 pm</td>
                        <td>Saturday, Sunday & Public Holidays</td>
                    </tr>
                    <tr>
                        <td>4:00 pm – 6:00 pm</td>
                        <td>Monday to Friday</td>
                    </tr>
                    <tr>
                        <td>3:30 pm – 6:00 pm</td>
                        <td>Saturday, Sunday & Public Holidays</td>
                    </tr>
                    <tr>
                        <td>7:00 pm – 8:00 pm</td>
                        <td>All Days</td>
                    </tr>
                </tbody>
            </table>

            <p class="note">
                Temple timings may change on special occasions and festival days.
            </p>

            <div class="highlight-box">
                <strong>Dress Code:</strong> Men are required to remove shirt and vest while having darshan.
            </div>
        </div>

        <div class="timing-card">
            <h3>Yoga Narasimha Swamy Darshan Timings</h3>

            <table>
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Days</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>9:30 am – 1:30 pm</td>
                        <td>Daily</td>
                    </tr>
                    <tr>
                        <td>5:30 pm – 8:00 pm</td>
                        <td>Daily</td>
                    </tr>
                </tbody>
            </table>

            <div class="highlight-box warning">
                Online booking is <strong>not available</strong>. Tickets are issued on arrival at the temple counter.
            </div>

            <p class="note">
                Darshan timings may vary during festival days.
            </p>
        </div>
    </section>

    <style>
        /* =========================
   Timings Section Styling
========================= */

        .timings-section {
            background: #ffffff;
            padding: 50px 55px;
            margin: 60px auto;
            border-radius: 14px;
            max-width: 980px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.06);
            position: relative;
        }

        .timings-section::before {
            content: "";
            position: absolute;
            left: 0;
            top: 40px;
            bottom: 40px;
            width: 6px;
            background: linear-gradient(180deg, #2f7d4a, #7ccf9a);
            border-radius: 0 6px 6px 0;
        }

        .timings-section h2 {
            font-size: 2.2rem;
            color: #1f5c3a;
            margin-bottom: 10px;
        }

        .subtitle {
            font-size: 1.05rem;
            color: #555;
            margin-bottom: 35px;
        }

        .timing-card {
            margin-bottom: 45px;
        }

        .timing-card h3 {
            font-size: 1.5rem;
            color: #245a3a;
            margin-bottom: 15px;
        }

        /* =========================
   Table Styling
========================= */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 18px;
        }

        thead th {
            background: #e8f3ed;
            color: #1f5c3a;
            font-weight: 600;
            text-align: left;
            padding: 12px 15px;
        }

        tbody td {
            padding: 12px 15px;
            border-bottom: 1px solid #e0e0e0;
            font-size: 1.05rem;
        }

        /* =========================
   Highlights & Notes
========================= */
        .note {
            font-size: 0.95rem;
            color: #666;
            margin-top: 10px;
        }

        .highlight-box {
            background: #f1f8f4;
            border-left: 5px solid #2f7d4a;
            padding: 14px 18px;
            margin-top: 18px;
            border-radius: 6px;
            font-size: 1.05rem;
        }

        .highlight-box.warning {
            background: #fff6e8;
            border-left-color: #e09b2d;
        }

        /* =========================
   Mobile Responsive
========================= */
        @media (max-width: 768px) {
            .timings-section {
                padding: 35px 25px;
                margin: 40px 15px;
            }

            h2 {
                font-size: 1.8rem;
            }

            table thead {
                display: none;
            }

            table,
            tbody,
            tr,
            td {
                display: block;
                width: 100%;
            }

            tbody tr {
                margin-bottom: 15px;
            }

            tbody td {
                padding: 10px 0;
                border: none;
            }
        }
    </style>