import pathlib
desktop = pathlib.Path(".")

# .rglob() produces a generator too
desktop.rglob("*")

# Which you can wrap in a list() constructor to materialize
liste = list(desktop.rglob("*"))

for i in liste:
    stringy = r"{}".format(str(i))
    replaced = stringy.replace('\\', '/')
    print("'./" + replaced + "',")
