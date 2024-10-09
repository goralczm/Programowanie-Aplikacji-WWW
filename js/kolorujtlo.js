var computed = false;
var decimal = 0;

function covert(entryform, from, to)
{
    convertfrom = from.selectedIndex;
    converrto = to.selectedIndex;
    entryform.display.value = (entryform.input.value * from[convertfrom].value / to[converrto].value);
}

function addChar (input, character)
{
    if ((character == '.' && decimal == "0") || character != '.')
    {
        (input.value == "" || input.value == "0") ? input.value = character : input.value += character;
        convert(input.form, input.form.measure1, input.form.measure2)
        computed = true;
        if (character == '.')
        {
            decimal = 1;
        }
    }
}

function openVothcom()
{
    window.open("", "Display window", "toolbar=no,directiories=no,menubar=no");
}

function clear(form)
{
    form.input.value = 0;
    form.display.value = 0;
    decimal = 0;
}

function changeBackground(hexNumber)
{
    document.bgColor = hexNumber;
    document.cookie = hexNumber;
}

function loadSavedBackground()
{
    if (document.cookie != "")
        changeBackground(document.cookie);
}