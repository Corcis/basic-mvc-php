class  Producto{
 constructor(id,nombre,precio,descripcion){
    this._id=id;
    this._nombre=nombre;
    this._precio = precio;
    this._descripcion = descripcion;
  }


   get id(){
    return this._id;
  }
  set id(id){
    this._id=id;
  }
  get nombre(){
    return this._nombre;
  }
  set nombre(nombre){
    this._nombre=nombre;
  }
  get precio(){
    return this._precio;
  }
  set precio(precio){
    this._precio=precio;
  }
  
  get descripcion(){
    return this._descripcion;
  }
  set descripcion(descripcion){
    this._descripcion=descripcion;
  }
}