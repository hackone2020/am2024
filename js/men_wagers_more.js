function show() {
    if (class2 == "四全中") {
        if (lmlx == 0) {
            var number_array = number1.split(",");
            var number_array_count = number_array.length - 1;
            var m = 0;
            for (var i = 0; i < number_array_count - 2; i++) {
                for (var j = i + 1; j < number_array_count - 1; j++) {
                    for (var k = j + 1; k < number_array_count; k++) {
                        for (var l = k + 1; l < number_array_count; l++) {
                            var class3 = number_array[i] + "," + number_array[j] + "," + number_array[k] + "," + number_array[l];
                            var n1 = number_array[i];
                            var n2 = number_array[j];
                            var n3 = number_array[k];
                            var n4 = number_array[l];
                            var rate = Math.min(rate1[n1], rate1[n2], rate1[n3], rate1[n4]);
                            var str = class3 + "  赔率:" + rate + "&nbsp;&nbsp;&nbsp;";
                            m += 1;
                            str = str + "<br>";
                            document.write(str)
                        }
                    }
                }
            };
            document.write("<br>总" + m + "组 每组:" + rounds(sum_m / m) + "元 共" + sum_m + "元")
        }
    };
    if (class2 == "三全中" || class2 == "三中二") {
        if (lmlx == 0) {
            var number_array = number1.split(",");
            var number_array_count = number_array.length - 1;
            var m = 0;
            for (var i = 0; i < number_array_count - 2; i++) {
                for (var j = i + 1; j < number_array_count - 1; j++) {
                    for (var k = j + 1; k < number_array_count; k++) {
                        var class3 = number_array[i] + "," + number_array[j] + "," + number_array[k];
                        var n1 = number_array[i];
                        var n2 = number_array[j];
                        var n3 = number_array[k];
                        if (class2 == "三全中") {
                            var rate = Math.min(rate1[n1], rate1[n2], rate1[n3]);
                            var str = class3 + "  赔率:" + rate + "&nbsp;&nbsp;&nbsp;"
                        } else {
                            var rate = Math.min(rate1[n1], rate1[n2], rate1[n3]);
                            var rates = Math.min(rate2[n1], rate2[n2], rate2[n3]);
                            var str = class3 + "  赔率:" + rate + "/" + rates + "&nbsp;&nbsp;&nbsp;"
                        };
                        m += 1;
                        str = str + "<br>";
                        document.write(str)
                    }
                }
            };
            document.write("<br>总" + m + "组 每组:" + rounds(sum_m / m) + "元 共" + sum_m + "元")
        };
        if (lmlx == 2) {
            var number_array1 = number1.split(",");
            var number_array_count1 = number_array1.length - 1;
            var number_array2 = number2.split(",");
            var m = 0;
            for (var k = 0; k < number_array_count1; k++) {
                var class3 = number_array2[0] + "," + number_array2[1] + "," + number_array1[k];
                var n1 = number_array2[0];
                var n2 = number_array2[1];
                var n3 = number_array1[k];
                if (class2 == "三全中") {
                    var rate = Math.min(rate1[n1], rate1[n2], rate1[n3]);
                    var str = class3 + "  赔率:" + rate + "&nbsp;&nbsp;&nbsp;"
                } else {
                    var rate = Math.min(rate1[n1], rate1[n2], rate1[n3]);
                    var rates = Math.min(rate2[n1], rate2[n2], rate2[n3]);
                    var str = class3 + "  赔率:" + rate + "/" + rates + "&nbsp;&nbsp;&nbsp;"
                };
                m += 1;
                str = str + "<br>";
                document.write(str)
            };
            document.write("<br>总" + m + "组 每组:" + rounds(sum_m / m) + "元 共" + sum_m + "元")
        }
    };
    if (class2 == "二全中" || class2 == "二中特" || class2 == "特串") {
        if (lmlx == 0) {
            var number_array = number1.split(",");
            var number_array_count = number_array.length - 1;
            var m = 0;
            for (var j = 0; j < number_array_count - 1; j++) {
                for (var k = j + 1; k < number_array_count; k++) {
                    var class3 = +number_array[j] + "," + number_array[k];
                    var n1 = number_array[j];
                    var n2 = number_array[k];
                    if (class2 == "二中特") {
                        var rate = Math.min(rate1[n1], rate1[n2]);
                        var rates = Math.min(rate2[n1], rate2[n2]);
                        var str = class3 + "  赔率:" + rate + "/" + rates + "&nbsp;&nbsp;&nbsp;"
                    } else {
                        var rate = Math.min(rate1[n1], rate1[n2]);
                        var str = class3 + "  赔率:" + rate + "&nbsp;&nbsp;&nbsp;"
                    };
                    m += 1;
                    str = str + "<br>";
                    document.write(str)
                }
            };
            document.write("<br>总" + m + "组 每组:" + rounds(sum_m / m) + "元 共" + sum_m + "元")
        };
        if (lmlx == 2) {
            var number_array1 = number1.split(",");
            var number_array_count1 = number_array1.length - 1;
            var number_array2 = number2.split(",");
            var m = 0;
            for (var k = 0; k < number_array_count1; k++) {
                var class3 = number_array2[0] + "," + number_array1[k];
                var n1 = number_array2[0];
                var n2 = number_array1[k];
                if (class2 == "二中特") {
                    var rate = Math.min(rate1[n1], rate1[n2]);
                    var rates = Math.min(rate2[n1], rate2[n2]);
                    var str = class3 + "  赔率:" + rate + "/" + rates + "&nbsp;&nbsp;&nbsp;"
                } else {
                    var rate = Math.min(rate1[n1], rate1[n2]);
                    var str = class3 + "  赔率:" + rate + "&nbsp;&nbsp;&nbsp;"
                };
                m += 1;
                str = str + "<br>";
                document.write(str)
            };
            document.write("<br>总" + m + "组 每组:" + rounds(sum_m / m) + "元 共" + sum_m + "元")
        };
        if (lmlx == 1) {
            var number_array1 = number1.split(",");
            var number_array_count1 = number_array1.length;
            var number_array2 = number2.split(",");
            var number_array_count2 = number_array2.length;
            var m = 0;
            for (var j = 0; j < number_array_count2; j++) {
                for (var k = 0; k < number_array_count1; k++) {
                    if (number_array2[j] != number_array1[k]) {
                        var class3 = number_array2[j] + "," + number_array1[k];
                        var n1 = number_array2[j];
                        var n2 = number_array1[k];
                        if (class2 == "二中特") {
                            var rate = Math.min(rate1[n1], rate1[n2]);
                            var rates = Math.min(rate2[n1], rate2[n2]);
                            var str = class3 + "  赔率:" + rate + "/" + rates + "&nbsp;&nbsp;&nbsp;"
                        } else {
                            var rate = Math.min(rate1[n1], rate1[n2]);
                            var str = class3 + "  赔率:" + rate + "&nbsp;&nbsp;&nbsp;"
                        };
                        m += 1;
                        str = str + "<br>";
                        document.write(str)
                    }
                }
            };
            document.write("<br>总" + m + "组 每组:" + rounds(sum_m / m) + "元 共" + sum_m + "元")
        }
    };
    if (class2 == "五不中") {
        var number_array = number1.split(",");
        var number_array_count = number_array.length - 1;
        var m = 0;
        for (var i = 0; i < number_array_count - 4; i++) {
            for (var j = i + 1; j < number_array_count - 3; j++) {
                for (var k = j + 1; k < number_array_count - 2; k++) {
                    for (var l = k + 1; l < number_array_count - 1; l++) {
                        for (var n = l + 1; n < number_array_count; n++) {
                            var class3 = number_array[i] + "," + number_array[j] + "," + number_array[k] + "," + number_array[l] + "," + number_array[n];
                            var n1 = number_array[i];
                            var n2 = number_array[j];
                            var n3 = number_array[k];
                            var n4 = number_array[l];
                            var n5 = number_array[n];
                            var rate = Math.min(rate1[n1], rate1[n2], rate1[n3], rate1[n4], rate1[n5]);
                            var str = class3 + "  赔率:" + rate + "&nbsp;&nbsp;&nbsp;";
                            m += 1;
                            str = str + "<br>";
                            document.write(str)
                        }
                    }
                }
            }
        };
        document.write("<br>总" + m + "组 每组:" + rounds(sum_m / m) + "元 共" + sum_m + "元")
    };
    if (class2 == "六不中") {
        var number_array = number1.split(",");
        var number_array_count = number_array.length - 1;
        var m = 0;
        for (var i = 0; i < number_array_count - 5; i++) {
            for (var j = i + 1; j < number_array_count - 4; j++) {
                for (var k = j + 1; k < number_array_count - 3; k++) {
                    for (var l = k + 1; l < number_array_count - 2; l++) {
                        for (var n = l + 1; n < number_array_count - 1; n++) {
                            for (var o = n + 1; o < number_array_count; o++) {
                                var class3 = number_array[i] + "," + number_array[j] + "," + number_array[k] + "," + number_array[l] + "," + number_array[n] + "," + number_array[o];
                                var n1 = number_array[i];
                                var n2 = number_array[j];
                                var n3 = number_array[k];
                                var n4 = number_array[l];
                                var n5 = number_array[n];
                                var n6 = number_array[o];
                                var rate = Math.min(rate1[n1], rate1[n2], rate1[n3], rate1[n4], rate1[n5], rate1[n6]);
                                var str = class3 + "  赔率:" + rate + "&nbsp;&nbsp;&nbsp;";
                                m += 1;
                                str = str + "<br>";
                                document.write(str)
                            }
                        }
                    }
                }
            }
        };
        document.write("<br>总" + m + "组 每组:" + rounds(sum_m / m) + "元 共" + sum_m + "元")
    };
    if (class2 == "七不中") {
        var number_array = number1.split(",");
        var number_array_count = number_array.length - 1;
        var m = 0;
        for (var i = 0; i < number_array_count - 6; i++) {
            for (var j = i + 1; j < number_array_count - 5; j++) {
                for (var k = j + 1; k < number_array_count - 4; k++) {
                    for (var l = k + 1; l < number_array_count - 3; l++) {
                        for (var n = l + 1; n < number_array_count - 2; n++) {
                            for (var o = n + 1; o < number_array_count - 1; o++) {
                                for (var p = o + 1; p < number_array_count; p++) {
                                    var class3 = number_array[i] + "," + number_array[j] + "," + number_array[k] + "," + number_array[l] + "," + number_array[n] + "," + number_array[o] + "," + number_array[p];
                                    var n1 = number_array[i];
                                    var n2 = number_array[j];
                                    var n3 = number_array[k];
                                    var n4 = number_array[l];
                                    var n5 = number_array[n];
                                    var n6 = number_array[o];
                                    var n7 = number_array[p];
                                    var rate = Math.min(rate1[n1], rate1[n2], rate1[n3], rate1[n4], rate1[n5], rate1[n6], rate1[n7]);
                                    var str = class3 + "  赔率:" + rate + "&nbsp;&nbsp;&nbsp;";
                                    m += 1;
                                    str = str + "<br>";
                                    document.write(str)
                                }
                            }
                        }
                    }
                }
            }
        };
        document.write("<br>总" + m + "组 每组:" + rounds(sum_m / m) + "元 共" + sum_m + "元")
    };
    if (class2 == "八不中") {
        var number_array = number1.split(",");
        var number_array_count = number_array.length - 1;
        var m = 0;
        for (var i = 0; i < number_array_count - 7; i++) {
            for (var j = i + 1; j < number_array_count - 6; j++) {
                for (var k = j + 1; k < number_array_count - 5; k++) {
                    for (var l = k + 1; l < number_array_count - 4; l++) {
                        for (var n = l + 1; n < number_array_count - 3; n++) {
                            for (var o = n + 1; o < number_array_count - 2; o++) {
                                for (var p = o + 1; p < number_array_count - 1; p++) {
                                    for (var q = p + 1; q < number_array_count; q++) {
                                        var class3 = number_array[i] + "," + number_array[j] + "," + number_array[k] + "," + number_array[l] + "," + number_array[n] + "," + number_array[o] + "," + number_array[p] + "," + number_array[q];
                                        var n1 = number_array[i];
                                        var n2 = number_array[j];
                                        var n3 = number_array[k];
                                        var n4 = number_array[l];
                                        var n5 = number_array[n];
                                        var n6 = number_array[o];
                                        var n7 = number_array[p];
                                        var n8 = number_array[q];
                                        var rate = Math.min(rate1[n1], rate1[n2], rate1[n3], rate1[n4], rate1[n5], rate1[n6], rate1[n7], rate1[n8]);
                                        var str = class3 + "  赔率:" + rate + "&nbsp;&nbsp;&nbsp;";
                                        m += 1;
                                        str = str + "<br>";
                                        document.write(str)
                                    }
                                }
                            }
                        }
                    }
                }
            }
        };
        document.write("<br>总" + m + "组 每组:" + rounds(sum_m / m) + "元 共" + sum_m + "元")
    };
    if (class2 == "九不中") {
        var number_array = number1.split(",");
        var number_array_count = number_array.length - 1;
        var m = 0;
        for (var i = 0; i < number_array_count - 8; i++) {
            for (var j = i + 1; j < number_array_count - 7; j++) {
                for (var k = j + 1; k < number_array_count - 6; k++) {
                    for (var l = k + 1; l < number_array_count - 5; l++) {
                        for (var n = l + 1; n < number_array_count - 4; n++) {
                            for (var o = n + 1; o < number_array_count - 3; o++) {
                                for (var p = o + 1; p < number_array_count - 2; p++) {
                                    for (var q = p + 1; q < number_array_count - 1; q++) {
                                        for (var r = q + 1; r < number_array_count; r++) {
                                            var class3 = number_array[i] + "," + number_array[j] + "," + number_array[k] + "," + number_array[l] + "," + number_array[n] + "," + number_array[o] + "," + number_array[p] + "," + number_array[q] + "," + number_array[r];
                                            var n1 = number_array[i];
                                            var n2 = number_array[j];
                                            var n3 = number_array[k];
                                            var n4 = number_array[l];
                                            var n5 = number_array[n];
                                            var n6 = number_array[o];
                                            var n7 = number_array[p];
                                            var n8 = number_array[q];
                                            var n9 = number_array[r];
                                            var rate = Math.min(rate1[n1], rate1[n2], rate1[n3], rate1[n4], rate1[n5], rate1[n6], rate1[n7], rate1[n8], rate1[n9]);
                                            var str = class3 + "  赔率:" + rate + "&nbsp;&nbsp;&nbsp;";
                                            m += 1;
                                            str = str + "<br>";
                                            document.write(str)
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        };
        document.write("<br>总" + m + "组 每组:" + rounds(sum_m / m) + "元 共" + sum_m + "元")
    };
    if (class2 == "十不中") {
        var number_array = number1.split(",");
        var number_array_count = number_array.length - 1;
        var m = 0;
        for (var i = 0; i < number_array_count - 9; i++) {
            for (var j = i + 1; j < number_array_count - 8; j++) {
                for (var k = j + 1; k < number_array_count - 7; k++) {
                    for (var l = k + 1; l < number_array_count - 6; l++) {
                        for (var n = l + 1; n < number_array_count - 5; n++) {
                            for (var o = n + 1; o < number_array_count - 4; o++) {
                                for (var p = o + 1; p < number_array_count - 3; p++) {
                                    for (var q = p + 1; q < number_array_count - 2; q++) {
                                        for (var r = q + 1; r < number_array_count - 1; r++) {
                                            for (var s = r + 1; s < number_array_count; s++) {
                                                var class3 = number_array[i] + "," + number_array[j] + "," + number_array[k] + "," + number_array[l] + "," + number_array[n] + "," + number_array[o] + "," + number_array[p] + "," + number_array[q] + "," + number_array[r] + "," + number_array[s];
                                                var n1 = number_array[i];
                                                var n2 = number_array[j];
                                                var n3 = number_array[k];
                                                var n4 = number_array[l];
                                                var n5 = number_array[n];
                                                var n6 = number_array[o];
                                                var n7 = number_array[p];
                                                var n8 = number_array[q];
                                                var n9 = number_array[r];
                                                var n10 = number_array[s];
                                                var rate = Math.min(rate1[n1], rate1[n2], rate1[n3], rate1[n4], rate1[n5], rate1[n6], rate1[n7], rate1[n8], rate1[n9], rate1[n10]);
                                                var str = class3 + "  赔率:" + rate + "&nbsp;&nbsp;&nbsp;";
                                                m += 1;
                                                str = str + "<br>";
                                                document.write(str)
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        };
        document.write("<br>总" + m + "组 每组:" + rounds(sum_m / m) + "元 共" + sum_m + "元")
    }
}